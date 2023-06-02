<?php
session_start();
include "connect.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function send_otp($get_email, $rand_num)
{
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$otp = $rand_num;

    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = "smtp.gmail.com";                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'hello.brichbookstore@gmail.com';                     //SMTP username
    $mail->Password   = 'bwitoluwydeqbfdr';                               //SMTP password
    $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('hello.brichbookstore@gmail.com', 'Email Verification');
    $mail->addAddress($get_email);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Email Verification';

    //$finalotp = password_hash($otp, PASSWORD_DEFAULT); //hash cookie for security
    //setcookie("otp", $finalotp, time() + 3600, '/'); //cookie set for 1hour

    $mail_template ="
    <h2>Hello</h2>
    <p>Your OTP for email verification is <strong> $otp</strong></p>
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

    $email = mysqli_real_escape_string($conn,$_GET['email']);
    $rand_num = rand(11111, 99999);
    $_SESSION['otp'] = $rand_num;
    $check_email = "select email from users where email = '$email' limit 1";
    $check_email_run = mysqli_query($conn, $check_email);

    if(mysqli_num_rows($check_email_run)>0)
    {
        $row = mysqli_fetch_array($check_email_run);
        $get_email = $row['email'];

        $updatecode = "update users set otpcode = '$rand_num' where email = '$get_email' limit 1";
        $updatecoderun = mysqli_query($conn, $updatecode);

        if($updatecoderun)
        {
            send_otp($get_email, $rand_num);
            $_SESSION['verifyemail'] = $email;
            $_SESSION['msg'] = "We've sent a verification code to your email";
            header("Location: userotp.php");
            exit(0);
        }
        else
        {
            $_SESSION['errormsg']= "Something went wrong...";
            header("Location: userprofile.php");
            exit(0);
        }
       
    }
    else{
        $_SESSION['errormsg'] = "Email Not Found";
        header("Location: userprofile.php");
        exit(0);
    }
       
?>