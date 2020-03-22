<?php
    session_start();

    if(isset($_SESSION['user'])) {
        require 'conn.php';

        $stm = "SELECT c_id, c_name FROM categories;";
        $stmt = "SELECT DISTINCT location FROM jobs;";
        $sql = mysqli_query($conn, $stm) or die( mysqli_error($conn));;
        $option = '';
        while($row = mysqli_fetch_assoc($sql)) {
           $option .= '<option value = "'.$row['c_name'].'">'.$row['c_name'].'</option>';
        }
    } else {
        header('Location: signIn.php');
    }
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
        .content select {
            width: 350px;
            height: 3rem;
            padding: 2px 15px;
        }
    </style>
    <title>JobLister</title>
</head>
<body>
    <div class="container" id="wide">
        <h2>Add a new job post</h2>
        <form action="add.php" method="POST">
            <div class="content" id="left">
                <label for="cat">Category</label>
                <select name="cat">
                    <?php echo $option; ?>
                </select>
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
                <input class="submit-add" name="submit-add" type="submit" value="Submit">
            </div>
        </form>
    </div>
</body>
</html>