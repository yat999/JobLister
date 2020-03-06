<?php
    session_start();
    require 'conn.php';

    if(isset($_POST['apply'])) {
        if(isset($_SESSION['user'])) {
            $jid = $_POST['jid'];
            $uid = $_POST['uid'];
            $date = date('y-m-d');
            $status = '';

            $stmt = 'INSERT INTO applications(u_id, j_id, date, status) VALUES (?, ?, ?, ?)';
            $sql = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($sql, $stmt);
            mysqli_stmt_bind_param($sql, "ddss", $uid, $jid, $date, $status);
            if(mysqli_stmt_execute($sql)) {
                echo 'successfull';
                header('Location: index.php');
            } else {
                echo 'unsuccessfull: '. mysqli_error($conn);
            }
        } else {
            header('Location: signIn.php');
        }
    }else {
        header('Location: index.php');
    }