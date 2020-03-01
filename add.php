<?php

#if(isset($_POST['submit-add'])) {
    require 'conn.php';

    $cat = $_POST['cat'];
    $company = $_POST['comp'];
    $job = $_POST['job'];
    $desc = $_POST['desc'];
    $salary = $_POST['salary'];
    $loc = $_POST['loc'];
    $contact = $_POST['cont'];
    $email = $_POST['email'];
    echo $cat.$company.$job.$desc.$salary.$loc.$contact.$email;

    $stm = 'INSERT INTO jobs(category, company, job_title, description, salary, location, contact_user, contact_email) VALUES(?, ?, ?, ?, ?, ?, ?, ?)';
    $sql = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($sql, $stm) or die(mysqli_error($conn));
    mysqli_stmt_bind_param($sql, "ssssssss", $cat, $company, $job, $desc, $salary, $loc, $contact, $email);

    if(!$conn) {
        header('Location: index.php?error=sqlerror'.mysqli_error($conn));
        exit();
    } else if(mysqli_stmt_execute($sql)) {
        header('Location: index.php');
    } else {
        echo "Unsuccessful: ". mysqli_error($conn);
        #header('Location: index.php?error='.mysqli_error($conn));
    }
#} else {
#    header('Location: addPost.php');
#}