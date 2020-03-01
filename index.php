<?php
    session_start();

    require 'conn.php';

    $stm = "SELECT c_id, c_name FROM categories;";
    $stmt = "SELECT DISTINCT location FROM jobs;";
    $sql = mysqli_query($conn, $stm) or die( mysqli_error($conn));;
    $option = '';
    while($row = mysqli_fetch_assoc($sql)) {
       $option .= '<option value = "'.$row['c_id'].'">'.$row['c_name'].'</option>';
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
            <div class="categories">
                <select> 
                    <?php echo $option; ?>
                </select>
            </div>
            <div class= "location">
                <select>
                    <?php echo $loc; ?>
                </select>
            </div><br>
            <input type="button" value="Search"></button>
        </div>
        <div class="bar">
            <h3><?php ?> posts found</h3>
            <input type="button" value="+ add" onClick="location.href='addPost.php'"></input>
        </div>
        <div class="jobs">
            <?php
                $stm1 = 'SELECT * FROM jobs;';
                $sql = mysqli_query($conn, $stm1) or die( mysqli_error($conn));
                while($row = mysqli_fetch_array($sql, MYSQLI_BOTH)) {
                ?>
                    <div class="jobs-container">
                        <form method="POST" action="apply.php">
                            <table>
                                <tr colspan=2><h2><?php echo $row['job_title']; ?></h2></tr>
                                <tr colspan=2><td><h4><?php echo $row['company']; ?></h4></td><td><h4><?php echo $row['location']; ?></h4></td></tr>
                                <tr><td><h4><?php echo $row['salary']; ?></h4></td><td rowspan=3><p><?php echo $row['description']; ?></tr>
                                <tr><td><h4><?php echo $row['contact_email']; ?></h4></td></tr>
                                <tr><td><h4><?php echo $row['contact_user']; ?></h4></td></tr>
                            </table>
                            <input type="submit" name="apply" value="Apply">
                        </form>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </main>
</body>
</html>
