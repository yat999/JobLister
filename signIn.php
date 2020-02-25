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
<body>
    <reg>
    <section class="container">
        <h1>Job<b>Lister</b></h1>
        <div class="content">
            <form action="logIn.php" method="POST">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" required placeholder="you@example.com">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required placeholder="Your password">
                <a href="#" class="more">Forgot your password?</a>
                <div class="submit-wrap">
                    <input name="submit-login" type="submit" value="Sign in" class="submit">
                </div>
            </form>
        </div>
    </section>
    </reg>
</body>
</html>