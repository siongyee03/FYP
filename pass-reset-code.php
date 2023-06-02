<?php
include "connect.php";
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function send_password_reset($get_email, $token)
{
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = "smtp.gmail.com";                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'hello.brichbookstore@gmail.com';                     //SMTP username
    $mail->Password   = 'bwitoluwydeqbfdr';                               //SMTP password
    $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('hello.brichbookstore@gmail.com', 'Password Reset');
    $mail->addAddress($get_email);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Reset Password Notification';

    $mail_template ="
    <h2>Hello</h2>
    <p>Someone has requested a link to change your password, and you can do this through the link below.</p>
    <p>If you didn't request this, please ignore this email. Your password won't change until you access the link below and create a new one.</p>
    <br>
    <a href='http://localhost/fypp2/forgotreset.php?token=$token&email=$get_email'>Reset My Password</a>
    <br>
    <p>Best regards,</p>
    <p>BRICH BOOKSTORE TEAM</p>
    ";

    $mail->Body = $mail_template;

    try {
        $mail->send();
        echo "Message has been sent successfully";
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}

    $email = mysqli_real_escape_string($conn,$_POST['resetemail']);

    $token = md5(rand());
    
    $check_email = "select email from users where email = '$email' limit 1";
    $check_email_run = mysqli_query($conn, $check_email);
    
    if(mysqli_num_rows($check_email_run)>0)
    {
        $row = mysqli_fetch_array($check_email_run);
        $get_email = $row['email'];
    
        $updatetoken = "update users set verify_token = '$token' where email = '$get_email' limit 1";
        $updatetokenrun = mysqli_query($conn, $updatetoken);
    
        if($updatetoken)
        {
            send_password_reset($get_email, $token);
            $_SESSION['msg'] = "E-mail Sent";
            header("Location: forgotemail.php");
            exit(0);
        }
        else{
            $_SESSION['errormsg']= "Something went wrong...";
            header("Location: forgotemail.php");
            exit(0);
        }
    }
    else{
        $_SESSION['errormsg'] = "Email Not Found";
        header("Location: forgotemail.php");
        exit(0);
    }


?>