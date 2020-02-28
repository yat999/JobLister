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
    <title>JobLister</title>
</head>
<body>
    <div class="cont">
    <form action="add.php" method="GET">
        <div class="content" id="left">
            <label for="comp">Company</label>
            <input type="text" name="comp" id="comp" required>
            <label for="job">Job Title</label>
            <input type="text" name="job" id="job" required>
            <label for="desc">Description</label>
            <input type="textarea" name="desc" id="desc" required>
            <label for="salary">Salary</label>
            <input type="number" name="salary" id="salary" required>
        </div>
        <div class="content" id="right">
            <label for="loc">Location</label>
            <input type="loc" name="loc" id="loc" required>
            <label for="cont">Contact</label>
            <input type="tel" name="cont" id="cont" required>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div class="submit-wrap">
            <input name="submit-reg" type="submit" value="Register" class="submit">
        </div>
    </form>
    </div>
</body>
</html>