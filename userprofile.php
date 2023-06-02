<?php
include "connect.php";
include "header.php";

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

<!--edit profile css-->
<link rel="stylesheet" href="editprofile.css">

</head>
<body class="page-template belle">
<div class="pageWrapper">
	
    <!--Body Content-->
    <div id="page-content">
        <!--Page Title-->
        <div class="page section-header text-center">
            <div class="page-title">
                <div class="wrapper"><h1 class="page-width" style="padding-top: 60px">My Profile</h1></div>
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
              }else{
                $uid = $_SESSION['user_id'];

                mysqli_select_db($conn, "bookstore");
                $sql = "select * from users where id = '$uid'";

                $result = mysqli_query($conn, $sql);

                $user = mysqli_fetch_assoc($result);
              ?>
                  <div class="col-12 col-sm-12 col-md-12">
                      <div class="message">
                          <?php 
                          if(isset($_SESSION['msg']))
                          {
                          ?>
                              <div class="alert alert-success">
                                  <?= $_SESSION['msg'];?>
                              </div>
                                  <?php
                                  unset($_SESSION['msg']);
                                  }
                                  if(isset($_SESSION['errormsg']))
                                  {
                                  ?>
                                      <div class="alert alert-danger">
                                      <?= $_SESSION['errormsg'];?>
                                      </div>
                                  <?php
                                      unset($_SESSION['errormsg']);
                                  }
                                  ?>
                      </div>
                  </div>
                  <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                    <div id="accordionExample">
                        <h2 class="title h2"> basic info <a href="profileform.php" class="edit-i remove" style="float:right;" title="edit personal info"><i class="anm anm-edit" style="font-size:18px;" aria-hidden="true"></i></a></h2>
                        <hr class="my-4">
                          <div class="faq-body">
                              <div class="row">
                                <div class="col-lg-6">
                                    <div class="panel-content" style="font-size:15px;"><label class="form-control-label">Username :</label> <?php echo $user['username']?></div>
                                </div>
                              </div>
                          </div>

                          <div class="faq-body">
                              <div class="row">
                                <div class="col-lg-6">
                                  <div class="panel-content" style="font-size:15px;">
                                    <label class="form-control-label">Email address :</label> <?php echo $user['email']?>

                                    <?php if($user['verify_status'] == 0): ?>
                                    <span style="padding-left:20px;">
                                    <a href="useremailverify.php?email=<?php echo $user['email'];?>">
                                      <button class="btn btn-secondary btn--small" title="This email is not verified. &#013;Verify now.">verify</button>
                                    </a>
                                  </span>   
                                    <?php endif; ?>
                                    
                                  </div>   
                                </div>      
                              </div>
                          </div>
  
                          <hr class="my-4">
                          <!-- Address -->
                          <h2 class="title h2">Address <a href="profileadd.php" class="edit-i remove" style="float:right;" title="edit address"><i class="anm anm-edit" style="font-size:18px;" aria-hidden="true"></i></a></h2> 
                          <hr class="my-4">
                          <div class="faq-body">
                                <div class="row">
                                      <div class="col-lg-12">
                                            <div class="panel-content" style="font-size:15px;">
                                                <?php  
                                                $display = mysqli_query($conn, "select ship_address, city, states, postal, country from users where id = '$uid'");
                                               
                                                if(mysqli_fetch_assoc($display)==1)
                                                {
                                
                                                  echo $display['ship_address'].", "; echo $display['postal']." "; echo $display['city'].", "; 
                                                  echo $display['states'].", ";echo $display['country'];
                                                }
                                                else
                                                {
                                                  echo "Add a new address now";
                                                }
                                                ?>
                                            </div>                            
                                      </div>
                                </div>
                          </div>
                
                          <hr class="my-4">
                          <!-- Address -->
                          <h2 class="title h2"> Password <a href="profilepass.php" class="edit-i remove" style="float:right;" title="change password"><i class="anm anm-edit" style="font-size:18px;" aria-hidden="true"></i></a></h2>

                              <hr class="my-4">
                              <div class="faq-body">
                                <div class="row">
                                  <div class="col-lg-6" style="margin-left:30px;">
                                    <a href="logout.php" onclick="return confirm('Are you sure you want to log out?')">
                                      <button type="button" class="btn btn--secondary get-rates" >Log Out</button></a>                                
                                  </div>
                                </div>
                              </div>
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
    
     <!-- Including Jquery -->
     <script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
     <script src="assets/js/vendor/jquery.cookie.js"></script>
     <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
     <script src="assets/js/vendor/wow.min.js"></script>
     <!-- Including Javascript -->
     <script src="assets/js/main.js"></script>
</div>
</body>

<!-- belle/faqs.html   11 Nov 2019 12:44:40 GMT -->
</html>