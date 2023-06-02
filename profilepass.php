<?php
include "connection.php";
include "header.php";

$error_oldpass = "";
$error_newpass = "";
$error_confirmpass = "";

if(isset($_POST['savebtn'])){
  $oldpass = $_POST['oldpass'];
  $newpass = $_POST['newpass'];
  $confirmpass = $_POST['confirmpass'];

  //validate input data
  if(empty($oldpass)){
    $error_oldpass = "Please enter your old password.";
  }

  if(empty($newpass)){
    $error_newpass = "Please enter a new password.";
  }
  elseif(!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', $newpass)){
    $error_newpass = "Password must contain minimum eight characters, at least one letter and one number.";
  }

  if(empty($confirmpass)){
    $error_confirmpass = "Please confirm your new password.";
  }
  elseif($newpass != $confirmpass){
    $error_confirmpass = "New password and confirm password do not match.";
  }

  if(empty($error_oldpass) && empty($error_newpass) && empty($error_confirmpass)){
    //check if old password matches current password in database
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id= '".$_SESSION['user_id']."'");
    $user = mysqli_fetch_assoc($result);
    if(password_verify($oldpass, $user['password_hash'])){
      //update user's password in database
      $newpass = password_hash($newpass, PASSWORD_DEFAULT);
      $result = mysqli_query($conn, "UPDATE users SET password_hash='".$newpass."' WHERE id= '".$_SESSION['user_id']."'");
      if($result){
        ?>
      <script type = "text/javascript">
          alert("Password updated successfully.");
        </script>
      <?php
      }
      else{
        ?>
          <script type = "text/javascript">
            alert("Error updating password. Please try again.");
          </script>
        <?php

        
      }
    }
    else{
         $error_oldpass = "Old password incorrect.";
    }
  }
}
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- belle/faqs.html   11 Nov 2019 12:44:40 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Profile &ndash; BRich Bookstore</title>
<meta name="description" content="description">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Favicon -->
<link rel="shortcut icon" href="assets/images/favicon.png" />
<!-- Plugins CSS -->
<link rel="stylesheet" href="assets/css/plugins.css">
<!-- Bootstap CSS -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<!-- Main Style CSS -->
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/responsive.css">
<link rel="stylesheet" href="assets/css/editprofile.css">
<!-- eye icon CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
 <!-- register validation -->
 <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>
<script src="assets/js/editpass.js" defer></script>

<style>
#updatefrm .col-lg-12{
  padding-top:5%;
}

.fa-eye{
position: absolute;
top: 58%;
right: 5%;
transform: translateY(-50%);
cursor: pointer;
color:lightgray;
}

.invalid{
  color:#e61422;
}
</style>


</head>
<body class="page-template belle">
<div class="pageWrapper">
	
    <!--Body Content-->
    <div id="page-content">
    	<!--Page Title-->
    	<div class="page section-header text-center">
          <div class="page-title">
              <div class="wrapper"><h1 class="page-width">My Profile</h1></div>
          </div>
		  </div>
      <div class="container">
          <div class="row">
              <?php
              if(!isset($_SESSION['user_id']))
              {
                ?>
                <div style=" display: flex; justify-content: center; align-items: center; margin: auto; width: 350px; height: 200px;  ">
                            <div class="text-center" style="font-size: 15px; word-spacing: 2px; line-height: 1.5;" >
                            <a href = "login.php"><button type="button" class="btn btn-small">LOGIN</button></a>
                            </div>
                        </div>
                <?php
              }else{?>          
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                    <div id="accordionExample">
                        <form id="addfrm" name="addfrm" method="POST" action=" " accept-charset="UTF-8" enctype="multipart/form-data" novalidate="novalidate">
                        <?php
                            $uid = $_SESSION['user_id'];

                            mysqli_select_db($conn, "bookstore");
                            $sql = "select * from users where id = '$uid'";
            
                            $result = mysqli_query($conn, $sql);
            
                            if($result){
                                while($user = mysqli_fetch_assoc($result)){
                                  ?>
                                  
                            <!-- Password -->
                              <h2>Change New password</h2>   
                              <div class="pl-lg-4">
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group focused">
                                      <label class="form-control-label" for="input-oldpass">Old password</label>
                                      <input type="password" id="input-oldpass" name="oldpass" class="form-control form-control-alternative">
                                      <i class="fa-solid fa-eye" id="show-old"></i> <!--for the eye icon-->   
                                      <span style="color:red;"><?php echo $error_oldpass; ?></span>
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group focused">
                                      <label class="form-control-label" for="input-newpass">New password</label>
                                      <input type="password" id="input-newpass" name="newpass" class="form-control form-control-alternative"> 
                                      <i class="fa-solid fa-eye" id="show-new"></i> <!--for the eye icon-->   
                                      <span style="color:red;"><?php echo $error_newpass; ?></span>
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group focused">
                                      <label class="form-control-label" for="input-confirmpass">Confirm password</label>
                                      <input type="password" id="input-confirmpass" name="confirmpass" class="form-control form-control-alternative">
                                      <i class="fa-solid fa-eye" id="show-confirm"></i> <!--for the eye icon-->   
                                      <span style="color:red;"><?php echo $error_confirmpass; ?></span>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                                <input type="submit" class="btn mb-3" name="savebtn" id="addfrm" value="update">
                              </div>
                            <?php
                              }
                            }
                          ?>
                        </form>
                    </div>
                </div>
          </div>
      </div>
      <?php
              }
              ?>
      
    </div>
    <!--End Body Content-->

    <?php
      include "footer.php";
    ?> 
    <!--Scoll Top-->
    <span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
    <!--End Scoll Top-->

    <!-- Script to toggle password visibility -->
    <script>
    var input = document.querySelectorAll('input[type="password"]');
    var showOld = document.querySelector('#show-old');
    var showNew = document.querySelector('#show-new');
    var showConfirm = document.querySelector('#show-confirm');
    showOld.addEventListener('click', active);
    showNew.addEventListener('click', active);
    showConfirm.addEventListener('click', active);

    function active() {
      this.classList.toggle("fa-eye-slash");
      input.forEach((field) => {
        const type = field.getAttribute("type") === "password" ? "text" : "password";
        field.setAttribute("type", type);
      });
    }
    </script>

  
</div>

</body>

<!-- belle/faqs.html   11 Nov 2019 12:44:40 GMT -->
</html>

<script src="assets/js/main.js"></script>