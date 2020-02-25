<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="tab.js"></script>
    <link rel="stylesheet" href="Styles/Style.css">
    <link rel="stylesheet" href="Styles/Reset.css">
    <title>JobLister | Sign In</title>
    <style>
        html{
            height: 100%;
        }
        body {
            background: linear-gradient(to bottom right, #000428, #4286f4);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
        }
    </style>
</head>
<main>
    <div class="container">
        <h1>Job<b>Lister</b></h1>
        <form action="signUp.php" method="POST">
            <div class="left">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" required placeholder="you@example.com">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required placeholder="Your password">
                <label for="f_name">First Name</label>
                <input type="text" name="f_name" id="f_name" required placeholder="John">
                <label for="l_name">Last Name</label>
                <input type="text" name="l_name" id="l_name" required placeholder="Doe">
            </div>
            <div class="right">
                <label for="qual">Qualifictaion</label>
                <input type="text" name="qual" id="qual" required placeholder="Bachelor in Science">
                <label for="ph_no">Contact</label>
                <input type="ph_no" name="ph_no" id="ph_no" required placeholder="XXXXX XXXXX">
                <label for="dob">Date of Birth</label>
                <input type="date" name="dob" id="dob" required>
                <label for="resume">Resume</label>
                <input type="file" name="resume" id="resume" required>
            </div>
            <div class="submit-wrap">
                <input name="submit-login" type="submit" value="Sign in" class="submit">
            </div>
        </form>
    </div>
</main>