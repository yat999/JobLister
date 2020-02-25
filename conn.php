<?php
    $servername = "localhost";
    $username = "root";
    $password = "yatin99";
    $database = "JobLister";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if(!$conn){
        die("Connection failed: ". mysqli_connect_error());
    }