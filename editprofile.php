<?php
include "connect.php";
     
  session_start();
        $name = $_POST["uname"];
        $email = mysqli_real_escape_string($conn, $_POST['uemail']);
        $phone = $_POST["phone"];
        
        $e = "select email from users where email = '$email'";
        $ee = mysqli_query($conn, $e);
        if(mysqli_num_rows($ee)>0){
         
          die("Email already taken");
          header("refresh:0; url=profileform.php");
        }
        else{
          
          $result = mysqli_query($conn, "UPDATE users SET username='".$name."', email = '".$email."', phone = '".$phone."', verify_status = '0'
          WHERE id= '".$_SESSION['user_id']."'");
           //update successful
            if($result){
              ?>
              <script type = "text/javascript">
              alert("Updated. Please verify email.");
              </script>
              <?php

              header("refresh:0.1; url=useremailverify.php?email=$email");
              exit;
            }
            //update failed
            else{
              ?>
              <script type = "text/javascript">
              alert("Update failed");
              </script>
              <?php

              header("refresh:0.1; url=profileform.php");
              exit;
              }
        }


?>