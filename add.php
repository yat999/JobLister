<?php
    session_start();

if(isset($_POST['submit-add'])) {
    require 'conn.php';

    $u_id = $_SESSION['u_id'];
    $cat = $_POST['cat'];
    $company = $_POST['comp'];
    $job = $_POST['job'];
    $desc = $_POST['desc'];
    $salary = $_POST['salary'];
    $loc = $_POST['loc'];
    $contact = $_POST['cont'];
    $email = $_POST['email'];
    echo $u_id.$cat.$company.$job.$desc.$salary.$loc.$contact.$email.$_SESSION['u_id'];

    $stm = 'INSERT INTO jobs(u_id, category, company, job_title, description, salary, location, user_contact, user_email) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)';
    $sql = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($sql, $stm) or die(mysqli_error($conn));
    mysqli_stmt_bind_param($sql, "dssssssss", $u_id, $cat, $company, $job, $desc, $salary, $loc, $contact, $email);

    if(!$conn) {
        header('Location: index.php?error=sqlerror'.mysqli_error($conn));
        exit();
    } else if(mysqli_stmt_execute($sql)) {
        header('Location: index.php');
    } else {
        echo "Unsuccessful: ". mysqli_error($conn);
        header('Location: index.php?error='.mysqli_error($conn));
    }
} else {
    header('Location: addPost.php');
}