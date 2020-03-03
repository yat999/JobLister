<?php
    session_start();

    if(isset($_POST['apply'])) {
        if(isset($_SESSION['user'])) {

        } else {
            header('Location: signIn.php');
        }
    }else {
        header('Location: index.php');
    }