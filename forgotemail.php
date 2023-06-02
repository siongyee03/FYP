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
<title>Reset Password &ndash; BRich Bookstore</title>
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

<style>
    form .form-control-label{
        font-family: inherit;
        font-weight: 600;
        line-height: 1.5;
        margin-bottom: .5rem;
        color: #32325d;
    }

    .fa-eye{
    position: absolute;
    top: 58px;
    left: 178%;
    transform: translateY(-50%);
    cursor: pointer;
    color:lightgray;
    }

    form .message
    {
      padding:30px;
    }
    .alert
    {
      width: 588px;
      right: 6%;
      text-align: center;
      font-size:15px;
      font-weight: 500;
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
                <div class="wrapper"><h1 class="page-width" style="padding-top: 60px">Reset Password</h1></div>
            </div>
        </div>
      
      <div class="container">
          <div class="row">
              <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
                  <div class="mb-4">
                      <form id="sendemailfrm" name="sendemailfrm" class="contact-form" method="POST" action="pass-reset-code.php" accept-charset="UTF-8" novalidate="novalidate">
                          
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
                                
                                else if(isset($_SESSION['errormsg']))
                                {
                                  ?>
                                  <div class="alert alert-danger">
                                    <?= $_SESSION['errormsg'];?>
                                  </div>
                                  <?php
                                    unset($_SESSION['errormsg']);
                                }
                                else{
                                  ?>
                                  <div class="text-center">
                                  Enter your email to reset your password
                                  </div>
                                    <?php
                                }
                                ?>
                              </div>

                            <div class="row">
                              <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                  <label class="form-control-label" for="input-username">Email Address</label>
                                  <input type="email" id="resetemail" name="resetemail" placeholder="jesse@example.com"
                                  autofocus="" autocorrect="off" autocapitalize="off">
                                </div>
                              </div>
                            </div>
                        
                            <div class="row">
                              <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12" style="padding:40px;">
                                  <input type="submit" class="btn mb-3" name="sendbtn" id="sendemailfrm" value="send link">
                              </div>
                            </div>
                            
                      </form>
                  </div>
              </div>
          </div>
      </div>
      
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

     <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>
     <script src="assets/js/sendemail.js" defer></script>

</div>
</body>
</html>
