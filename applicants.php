<?php
    session_start();
    require 'conn.php';

    if(isset($_SESSION['user'])) {
        ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>JobLister | Console</title>
        <link rel="stylesheet" href="Styles/Style.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway|Poppins&display=swap" rel="stylesheet">
    </head>
    <body>
    <header>
        <a href="index.php">
            <h1>Job<b>Lister</b></h1>
        </a>
        <nav>
            <ul id ="navigation">
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="aboutus.php">About us</a></li>
                <?php
                    if(!isset($_SESSION['user'])) {
                        echo '<li id="login"><a href="signIn.php"><img src="Icons/user-solid.svg"></a>';
                    } else {
                        echo '<li id="logout"><a href="console.php">', $_SESSION['user'] ,'</a><ul></li><li><a href="console.php">My console</a></li><li id="logout"><a href="logOut.php">Log out</a></li></ul></li>';
                    }
                ?>
            </ul>
        </nav>
    </header>
    <main>
        <div class="sec-title">
            <h2>Applicants</h2>
        </div>

        <?php
            $array = array();
            $id = $_POST['id'];
            $stm1 = 'SELECT * FROM applications WHERE j_id=?';
            $sql = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($sql, $stm1);
            mysqli_stmt_bind_param($sql, "d", $id);
            mysqli_stmt_execute($sql);
            $result = mysqli_stmt_get_result($sql);

            while($r = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                array_push($array, $r[u_id]);
            }

            if(!empty($array)) {
                $query = mysqli_query($conn,  'SELECT * FROM user WHERE u_id IN ('.implode(',',$array).')');
                while($row = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                ?>
                <div class="jobs-container" name="job-post">
                    <div class="title">
                        <h2><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?> </h2>
                        <h4><?php echo $row['qualification']; ?> • <?php echo $row['grad']; ?></h4>
                    </div>
                    <div id="left" class="grid-left">
                        <h4><?php echo $row['user_email']; ?></h4>
                        <h4><?php echo $row['user_contact']; ?></h4>
                    </div>
                    <div class="grid-button">
                        <form target="_blank" action="<?php echo $row['resume']?>" method="POST">
                            <input type="submit" value="View Resume">
                        </form>
                    </div>
                </div>
                <hr>
            <?php
                }
            }
        ?><br>
    </main>
    <footer class="page-footer">
        <div class="left">
            <h5>JobLister</h5>
            <p>Let us help you excel</p>
        </div>
        <div class="right">
            <h5>Useful Links</h5>
            <ul>
                <li><a href="index.php">Homepage</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="register.php">Register</a></li>
            </ul>
        </div>
        <div class="footer-copyright">
            <small class="copy">All Content Copyright 2020 - JobLister. All Rights Reserved</small>
        </div>
    </footer>
    </body>
    </html>
        <?php
    } else {
        header('Location: index.php');
    }
