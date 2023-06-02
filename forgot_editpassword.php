<?php
include "connect.php";
session_start();

    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass_hash= password_hash($_POST['newpass'], PASSWORD_DEFAULT);

    $passtoken = mysqli_real_escape_string($conn,$_POST['pass_token']);

    if(!empty($passtoken))
    {
        //checking token valid or not
        $check_token = "select verify_token from users where verify_token = '$passtoken' limit 1";
        $check_token_run = mysqli_query($conn, $check_token);

                if(mysqli_num_rows($check_token_run)>0)
            {
              $update_pass = "update users set password_hash = '$pass_hash' where verify_token='$passtoken' limit 1";
              $update_pass_run = mysqli_query($conn, $update_pass);

              if($update_pass_run)
              {
                $newtoken = md5(rand());
                $update_new_token = "update users set verify_token = '$newtoken' where verify_token='$passtoken' limit 1";
                $update_new_token_run = mysqli_query($conn, $update_new_token);

                $_SESSION['success'] = "New Password Successfully Updated";
                header("Location: login.php");
                exit(0);
              }
              else
              {
                $_SESSION['errorstatus'] = "Cannot update password. Something went wrong...";
                header("Location: forgotreset.php?token=$passtoken&email=$email");
                exit(0);
              }
            }
            else
            {
                $_SESSION['errormsg'] = "No Token Available";
                header("Location: forgotemail.php");
                exit(0);
            }
    }
    else{
        $_SESSION['msg'] = "No Token Found";
        header("Location: forgotemail.php");
        exit(0);
    }
    
?>