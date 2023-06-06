<?php
session_start();
include "connect.php";

    $email = mysqli_real_escape_string($conn,$_POST['cemail']);
    $updateemail = "update users set email = '".$email."' where id = '".$_SESSION['user_id']."'";
    $run = mysqli_query($conn, $updateemail);

    if($run)
    {
        $_SESSION['msg'] = "Email Updated";
        $_SESSION['email'] = $email;
        header("Location: signup_cotp_code.php?cemail=$email");
        exit(0);
    }
    else{
        $_SESSION['errormsg'] = "Email Not Updated";
        header("Location: signup_changeEmailverify.php");
        exit(0);
    }
       
?>