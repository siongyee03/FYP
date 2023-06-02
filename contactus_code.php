<?php
include "connect.php";
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$fname = $_POST['fname'];
$email = mysqli_real_escape_string($conn,$_POST['uemail']);
$sub =  mysqli_real_escape_string($conn,$_POST['subject']);
$ordernum = $_POST['ordernum'];
$msg =  mysqli_real_escape_string($conn,$_POST['message']);


        if(isset($_SESSION['user_id']))
            {
                $update = mysqli_query($conn,"INSERT INTO contactus (uid, full_name, subject, msg, email, order_num) VALUES('".$_SESSION['user_id']."', '$fname','$sub', '$msg', '$email', '$ordernum')");
                if($update)
                {
                    respond($email, $fname);
                    $_SESSION['msg'] = "Message sent. Thank you for your message.";
                    header("Location: contactus.php");
                    exit(0);
                }
                else
                {
                    $_SESSION['errormsg'] = "Cannot send. Try again.";
                }
               
            }
            else
            {
                $update = mysqli_query($conn,"INSERT INTO contactus (full_name, subject, msg, email, order_num) VALUES ('$fname', '$sub', '$msg','$email', '$ordernum')");
                if($update)
                {
                    respond($email, $fname);
                    $_SESSION['msg'] = "Message sent. Thank you for your message.";
                    header("Location: contactus.php");
                    exit(0);
                }
                else
                {
                    $_SESSION['errormsg'] = "Cannot send. Try again.";
                    header("Location: contactus.php");
                    exit(0);
                }
            }

    function respond($email, $fname)
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
        $mail->setFrom('hello.brichbookstore@gmail.com');
        $mail->addAddress($email);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Thanks for reaching out. We \'re working on it!';

        $mail_template ="
        <h3>Dear $fname !</h3>
        <p>We just wanted to let you know we received your message and will get back to you as soon as we can.</p>
        <p>We are looking forward to serve you.</p>
        <br><br/>
        <p>Cheers,</p>
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
        
?>