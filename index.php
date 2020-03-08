<?php
    session_start();

    require 'conn.php';

    $stm = "SELECT c_id, c_name FROM categories;";
    $stmt = "SELECT DISTINCT location FROM jobs;";
    $sql = mysqli_query($conn, $stm) or die( mysqli_error($conn));;
    $option = '';
    while($row = mysqli_fetch_assoc($sql)) {
       $option .= '<option value = "'.$row['c_name'].'">'.$row['c_name'].'</option>';
    }
    $loc = '';
    $sql = mysqli_query($conn, $stmt) or die( mysqli_error($conn));;
    while($row = mysqli_fetch_assoc($sql)) {
        $loc .= '<option value = "'.$row['location'].'">'.$row['location'].'</option>';
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Styles/Style.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway|Poppins&display=swap" rel="stylesheet">
    <title>JobLister</title>
</head>
<body>
    <header>
        <a href="index.php">
            <h1>Job<b>Lister</b></h1>
        </a>
        <nav>
            <ul id ="navigation">
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="aboutus.php#contact">Contact us</a></li>
                <li><a href="aboutus.php">About us</a></li>
                <?php
                    if(!isset($_SESSION['user'])) {
                        echo '<li id="login"><a href="signIn.php"><img src="Icons/user-solid.svg"></a>';
                    } else {
                        echo '<li id="logout"><a href="logOut.php">', $_SESSION['user'] ,'</a><ul><li><a href="logOut.php">Log out</a></li></ul></li>';
                    }
                ?>
            </ul>
        </nav>
    </header>
    <main>
        <div class="searchbox">
            <h1>Find a job.</h1>
            <h3>Select a category & your preferred location</h3>
            <form action="index.php" method="POST">
                <div class="categories">
                    <select name="category" id="category" required> 
                        <option disabled selected>Select a category<option>
                        <?php echo $option; ?>
                    </select>
                </div>
                <div class="location">
                    <select name="location" id="location" required>
                        <option disabled selected>Select Location<option>
                        <?php echo $loc; ?>
                    </select>
                </div><br>
                <input type="submit" value="Search"></button>
            </form>
        </div>
        <div class="bar">
            <h3 id="count"> posts found</h3>
            <input type="button" value="+ add" onClick="location.href='addPost.php'"></input>
        </div>
        <div class="jobs" id="jobs">
            <?php
                if(!isset($_POST['category']) && !isset($_POST['location'])) {
                    $stm1 = 'SELECT * FROM jobs;';
                    $result = mysqli_query($conn, $stm1) or die( mysqli_error($conn));
                } else {
                    $cat = $_POST['category'];
                    $loc = $_POST['location'];

                    $stm1 = 'SELECT * FROM jobs WHERE category=? AND location=?';
                    $sql = mysqli_stmt_init($conn);
                    mysqli_stmt_prepare($sql, $stm1);
                    mysqli_stmt_bind_param($sql, "ss", $cat, $loc);
                    mysqli_stmt_execute($sql);
                    $result = mysqli_stmt_get_result($sql);
                }

                while($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                ?>
                <div class="jobs-container" name="job-post">
                    <div class="title">
                        <h2><?php echo $row['job_title']; ?></h2>
                        <h4><?php echo $row['company']; ?> • <?php echo $row['location']; ?></h4>
                    </div>
                    <div id="left" class="grid-left">
                        <h4></h4>
                        <h4><?php echo $row['salary']; ?></h4>
                        <h4><?php echo $row['contact_email']; ?></h4>
                        <h4><?php echo $row['contact_user']; ?></h4>
                    </div>
                    <div class="grid-right">
                        <p><?php echo $row['description']; ?></tr>
                    </div>
                    <div class="grid-button">
                        <form action="apply.php" method="POST">
                            <input type="hidden" name="jid" value="<?php echo $row['job_id']; ?>">
                            <input type="hidden" name="uid" value="<?php echo $_SESSION['uid']; ?>">
                            <input type="submit" name="apply" value="Apply">
                        </form>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
        <script>
            var count = document.getElementById("jobs").childElementCount;
            document.getElementById('count').innerHTML = count+" posts found";
        </script>
    </main>
</body>
</html>
