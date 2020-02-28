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
        $loc .= '<option value = "'.$row['job_id'].'">'.$row['location'].'</option>';
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
    </main>
