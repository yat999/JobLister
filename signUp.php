<?php 
    if(isset($_POST['submit-reg'])){
        require 'conn.php';
        
        $fname = $_POST['f_name'];
        $lname = $_POST['l_name'];
        $email = $_POST['email'];
        $ph_no = $_POST['ph_no'];
        $pass = $_POST['password'];
        $qual = $_POST['qual'];
        $grad = $_POST['grad'];
        
        $resume = $_POST['resume'];
        $tmp_name = $_FILES['resume']['tmp_name'];
        $location = "uploads/";
        $max_size = 1000000;
        $name = $_FILES['resume']['name'];
        $size = $_FILES['resume']['size'];
        $type = $_FILES['resume']['type'];

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header('Location: register.php?error=invalidemail&uid='.$fname);
            exit();
        }

        $extension = substr($name, strpos($name, '.') + 1);
        if(isset($name) && !empty($name)){
            if(($extension == "pdf") && $type == "application/pdf" && $size<=$max_size){
                $location = "uploads/";
                if(move_uploaded_file($tmp_name, $location.$name)){
                    echo "Uploaded Successfully";

                    $stmt = "SELECT email FROM user WHERE email=?;";
                    $sql = mysqli_stmt_init($conn);
                    mysqli_stmt_prepare($sql, $stmt);
                    mysqli_stmt_bind_param($sql, "s", $user);
                    mysqli_stmt_execute($sql);
                    $result = mysqli_stmt_get_result($sql);

                    if(!$conn){
                        header('Location: register.php?error=sqlerror');
                        echo "Unsuccessful: ". mysqli_error($conn);
                        exit();
                    }else if(empty($result)) {
                        $filurl =$location.$name;
                        $hashpass = password_hash($pass, PASSWORD_DEFAULT);
                        $stm = "INSERT INTO user(first_name, last_name, contact_user, contact_email, password, qualification, grad, resume) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
                        mysqli_stmt_prepare($sql, $stm) or die(mysqli_error($conn));
                        mysqli_stmt_bind_param($sql, "ssssssss", $fname, $lname, $ph_no, $email, $hashpass, $qual, $grad, $fileurl);
                        if(mysqli_stmt_execute($sql)){
                            echo "Successful";
                            $_SESSION['user'] = $email;
                            header('Location: index.php?success');
                        } else {
                            echo "Unsuccessful: ". mysqli_error($conn);
                            header('Location: logIn.php?error=UserExists');
                        }
                    } 
                } else{
                    echo "<center><h2>Failed to Upload File</h2></center>" ;
                    sleep(5);
                    header('Location: register.php?error=UploadFailed');
                }
            } else{
                echo "<center><h2>File size should be 100 KiloBytes & Only PDF File</h2></center>" ;
                sleep(5);
                header('Location: register.php?error=FileTooBig');
            } 
        } else{
            echo "<center><h2>Please Select a File</h2></center>" ;
            sleep(5);
            header('Location: register.php?error=SelectAFile');
        }
    }else {
        header('Location: register.php');
        exit();
    }
