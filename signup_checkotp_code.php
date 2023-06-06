<?php
session_start();
include "connect.php";
    
    $user_otp = $_POST['emailotp'];
    $email = mysqli_real_escape_string($conn,$_POST['emailtoverify']);
    $code = $_SESSION['otp'];

    if($user_otp == $code)
    {
        $sql = "select * from users where email ='$email'";
        $sql_run = mysqli_query($conn, $sql);
        $result = mysqli_fetch_array($sql_run);

        $uid = $result['id'];

        $update = mysqli_query($conn, "UPDATE users SET email='$email' , verify_status = '1' WHERE id='$uid'");

        if($update)
        {
            ?> 
            <script type = "text/javascript">
              alert("Your Email Has Been Verified. Welcome.");
            </script>
            <?php
            
            header("refresh:0.1; url=index.php");
            exit;
        }
        else
        {
            die("Something Wrong");
        }
          
    }
    else
    {
        $_SESSION['errormsg'] = "<p>Incorrect OTP</p>";
        header("Location: signup_otpverify.php");
        exit(0);
    }
    

        
?>