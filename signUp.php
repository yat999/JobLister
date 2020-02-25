<?php 
    if(isset($_POST['submit-sign'])){
        require 'conn.php';
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $pass = $_POST['password'];

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header('Location: signIn.php?error=invalidemail&uid='.$name);
            exit();
        }

        $stmt = "SELECT username FROM user WHERE username=?;";
        $stmt1 = "SELECT email FROM user WHERE email=?;";
        $sql = mysqli_stmt_init($conn);
        if(!$conn){
            header('Location: signIn.php?error=sqlerror');
            echo "Unsuccessful: ". mysqli_error($conn);
            exit();
        }else{
            mysqli_stmt_prepare($sql, $stmt1);
            mysqli_stmt_bind_param($sql, "s", $email);
            mysqli_stmt_execute($sql);
            $result = mysqli_stmt_get_result($sql);
            $row = mysqli_fetch_assoc();

            if($row['email'] == $email){
                header('Location: signIn.php?error=invalidemail&email='.$email);
                echo $result;
                exit();
            }

            mysqli_stmt_prepare($sql, $stmt);
            mysqli_stmt_bind_param($sql, "s", $name);
            mysqli_stmt_execute($sql);
            $result = mysqli_stmt_get_result($sql);
            $row = mysqli_fetch_assoc();

            if($row['username'] == $name){
                header('Location: signIn.php?error=invalidusername');
                echo "Unsuccessful: ". mysqli_error($conn);
                exit();
            }

            $hashpass = password_hash($pass, PASSWORD_DEFAULT);
            $stm = "INSERT INTO user(username, email, addr, password) VALUES(?, ?, ?, ?)";
            mysqli_stmt_prepare($sql, $stm) or die(mysqli_error($conn));
            mysqli_stmt_bind_param($sql, "ssss", $name, $email, $address, $hashpass);
            if(mysqli_stmt_execute($sql)){
                echo "Successful";
                header('Location: signIn.php?success');
            }
            else {
                echo "Unsuccessful: ". mysqli_error($conn);
                header('Location: signIn.php?error=sqlerror');
            }
        }
    }else {
        header('Location: signIn.php');
        exit();
    }
