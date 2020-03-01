<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/Style.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway|Poppins&display=swap" rel="stylesheet">
    <style>
        html {
            height: 100%;
        }
        body {
            background: linear-gradient(to bottom right, #000428, #4286f4);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
        }
        .container {
            height: 400px;
        }
        input[type=submit] {
            transform: translateX(25px);
        }
    </style>
    <title>JobLister</title>
</head>
<body>
    <div class="container" id="wide">
        <h2>Add a new job post</h2>
        <form action="add.php" method="GET">
            <div class="content" id="left">
                <label for="comp">Company</label>
                <input type="text" name="comp" id="comp" required>
                <label for="job">Job Title</label>
                <input type="text" name="job" id="job" required>
                <label for="desc">Description</label>
                <textarea name="desc" id="desc" required></textarea>
            </div>
            <div class="content" id="right">
                <label for="salary">Salary</label>
                <input type="text" name="salary" id="salary" required>
                <label for="loc">Location</label>
                <input type="text" name="loc" id="loc" required>
                <label for="cont">Contact</label>
                <input type="tel" name="cont" id="cont" required>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="submit-wrap">
                <input class="submit-reg" type="submit" value="Submit" class="submit">
            </div>
        </form>
    </div>
</body>
</html>