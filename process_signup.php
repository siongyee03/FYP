<?php
session_start();
include "connect.php";

    $email = mysqli_real_escape_string($conn,$_POST['uemail']);
    $pass= password_hash($_POST['customerpassword'], PASSWORD_DEFAULT);
    $username = mysqli_real_escape_string($conn,$_POST['uname']);
  

    $sql = "INSERT INTO users (username,email,password_hash) VALUES ('$username', '$email', '$pass')";
    $sql_run = mysqli_query($conn, $sql);

    if($sql_run)
    {
        $_SESSION['email'] = $email;
        $_SESSION['user_id'] = mysqli_insert_id($conn);
        header("Location: signup_sendemailverify.php");
        exit(0);
    }
    else
    {
        die($conn->error." ". $conn->errno);
    }


?>