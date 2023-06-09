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
<title>Email Verification &ndash; BRich Bookstore</title>
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

<!-- signup verification form CSS-->
<link rel="stylesheet" href="assets/css/signup.css">

</head>
<body class="page-template belle">
<div class="pageWrapper">
	
    <!--Body Content-->
    <div id="page-content">
        <!--Page Title-->
        <div class="page section-header text-center">
            <div class="page-title">
                <div class="wrapper"><h1 class="page-width" style="padding-top: 60px">Email Verification</h1></div>
            </div>
        </div>
      
      <div class="container">
          <div class="row">
              <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
                  <div class="mb-4">
                    <form id="checkotpfrm" name="checkotpfrm" class=contact-form" method="POST" action="signup_checkotp_code.php" accept-charset="UTF-8" novalidate="novalidate">
                        <input type="hidden" value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];}?>" name="emailtoverify">
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

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="emailotp">Enter code</label>
                                        <input type="text" name="emailotp" placeholder="" id="emailotp" class="emailotp" 
                                        autocorrect="off" autocapitalize="off" autofocus="" autocomplete="off">
                                        <small>If you don't see it, you may need to check your spam folder.</small>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                    <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12" style="padding-top:30px;">
                                      <input type="submit" class="btn mb-3" name="sendbtn" id="checkotpfrm" value="Verify">
                                        <p class="mb-4">
                                        <a href="signup_resend_code.php" id="resendcode">Resend Code</a> &nbsp; | &nbsp;
                                        <a href="signup_changeEmailverify.php" id="changemail">Change Email</a> 
                                        </p>
                                    </div>
                                </div>

                            <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                                <input type="submit" class="btn mb-3" name="sendbtn" id="checkotpfrm" value="Verify">
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
     <script src="assets/js/verifyotp.js" defer></script>

</div>
</body>
</html>
