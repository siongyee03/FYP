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

<!--edit profile css-->
<link rel="stylesheet" href="editprofile.css">

<!-- eye icon CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


<style>
    .container{
        max-width: 900px;
        margin: auto;
        display:flex;
        justify-content:center;
    }

    form .form-group{
        width:400px;
    }
    form .col-lg-12{
    padding-top:7%;
    padding-bottom: 38px;
    }
    form .form-group{
    padding: 10px;
    }

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

    form .alert
    {
      left:10px;
      height:50px;
      width: 380px;
      font-size:15px;
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
                  <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                    <div id="accordionExample">
                    <form id="resetfrm" name="resetfrm" method="POST" action="forgot_editpassword.php" accept-charset="UTF-8" novalidate="novalidate">
                      <input type="hidden" value="<?php if(isset($_GET['token'])){echo $_GET['token'];}?>" name="pass_token">

                        <div class="pl-lg-4">
                          <div class="message">
                        <?php 
                            if(isset($_SESSION['status']))
                            {
                              ?>
                              <div class="alert alert-success">
                                <?= $_SESSION['status'];?>
                              </div>
                              <?php
                                unset($_SESSION['status']);
                            }
                            
                            if(isset($_SESSION['errorstatus']))
                            {
                              ?>
                              <div class="alert alert-danger">
                                <?= $_SESSION['errorstatus'];?>
                              </div>
                              <?php
                                unset($_SESSION['errorstatus']);
                            }
                          ?>
                          </div>

                          <div class="row">
                            <div class="col-lg-6">
                              <div class="form-group focused">
                                <label class="form-control-label" for="input-email">Email Address</label>
                                <input type="email" id="email" name="email" class="form-control form-control-alternative" autofocus="" 
                                autocorrect="off" autocapitalize="off" value="<?php if(isset($_GET['email'])){echo $_GET['email'];}?>">
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-lg-6">
                              <div class="form-group focused">
                                <label class="form-control-label" for="input-password">New Password</label>
                                <input type="password" id="newpass" name="newpass" class="form-control form-control-alternative" autofocus="" 
                                autocorrect="off" autocapitalize="off">
                                <i class="fa-solid fa-eye" id="show2"></i> <!--for the eye icon-->    
                              </div>
                            </div>
                          </div>
                        
                            <div class="row">
                                <div class="col-lg-6">
                                  <div class="form-group focused">
                                    <label class="form-control-label" for="input-address">Confirm New Password</label>
                                    <input type="password" id="newpassConfirm" name="newpassConfirm" class="form-control form-control-alternative"  autofocus="" 
                                    autocorrect="off" autocapitalize="off">
                                    <i class="fa-solid fa-eye" id="show3"></i> <!--for the eye icon-->    
                                  </div>
                                </div>
                            </div>

                        </div>

                            <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                                <input type="submit" class="btn mb-3" name="savebtn" id="resetfrm" value="Change">
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
     <script src="assets/js/resetpass.js" defer></script>

      <!--show/hide password-->
        <script>
            var input2 = document.querySelector('#newpass');
            var show2 = document.querySelector('#show2');
            show2.addEventListener('click', active);
            function active(){
            this.classList.toggle("fa-eye-slash");
            const type = input2.getAttribute("type")
            === "password" ? "text" : "password";
            input2.setAttribute("type", type);
            }
        </script>

        <script>
            var input3 = document.querySelector('#newpassConfirm');
            var show3 = document.querySelector('#show3');
            show3.addEventListener('click', active);
            function active(){
            this.classList.toggle("fa-eye-slash");
            const type = input3.getAttribute("type")
            === "password" ? "text" : "password";
            input3.setAttribute("type", type);
            }
        </script>
</div>
</body>
</html>