<?php

include "connect.php";
     
session_start();

$add = $_POST["address"];
$city = $_POST['city'];
$state = $_POST['state'];
$code = $_POST['postal'];

$result = mysqli_query($conn, "UPDATE users SET ship_address = '".$add."', 
          city = '".$city."', states = '".$state."', postal = '".$code."', country = 'Malaysia' 
          WHERE id= '".$_SESSION['user_id']."'");

          //update successful
          if($result){
            ?>
            <script type = "text/javascript">
            alert("Updated");
            </script>
            <?php
      
            header("refresh:0.1; url=userprofile.php");
            exit(0);
          }
          //update failed
          else{
            ?>
            <script type = "text/javascript">
            alert("Update failed");
            </script>
            <?php

            header("refresh:0.1; url=profileform.php");
            exit(0);
            }