<?php
    session_start();

    if(isset($_POST['submit-login'])){
        require 'conn.php';

        $user = $_POST['email'];
        $pass = $_POST['password'];

        $stmt = 'SELECT * FROM user WHERE email=?;';
        $sql = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($sql, $stmt);
        mysqli_stmt_bind_param($sql, "s", $user);
        mysqli_stmt_execute($sql);
        $result = mysqli_stmt_get_result($sql);
        $row = mysqli_fetch_assoc($result);
        $pwdchck = password_verify($pass, $row['password']);
        echo $pwdchck;
        if(mysqli_num_rows($result) == 0){
            header('Location: register.php');
        } else if($pwdchck == false) {
            header('Location: signIn.php?error=invaliduser/pwd');
        } else if($pwdchck == true){
            $_SESSION['user'] = $row['username'];
            $_SESSION['uid'] = $row['userId'];
            $_SESSION['address'] = $row['addr'];
            if(isset($_SESSION['continue'])){
                header("Location: {$_SESSION['continue']}");
                exit;
            }  else {
                header('Location: index.php');
            }
        }
    }else{
        header('Location: signIn.php');
    }