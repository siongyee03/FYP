<?php
include "header.php";
include "connect.php";
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- belle/register.html   11 Nov 2019 12:22:27 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Create an Account &ndash; BRICH Bookstore</title>
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

<!-- eye icon CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

<style>
.fa-eye{
position: absolute;
top: 58%;
right: 5%;
transform: translateY(-50%);
cursor: pointer;
color:lightgray;
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
        		<div class="wrapper"><h1 class="page-width" style="padding-top: 60px">Create an Account</h1></div>
      		</div>
		</div>
        <!--End Page Title-->
        
        <div class="container">
        	<div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
                	<div class="mb-4">
                       <form method="post" action="process_signup.php" id="signup" accept-charset="UTF-8" class="contact-form" novalidate>	
                          <div class="row">
                               <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="uname">User Name</label>
                                    <input type="text" name="uname" placeholder="" id="uname" autofocus="" spellcheck="false">
                                </div>
                               </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="uemail">Email</label>
                                    <input type="email" name="uemail" placeholder="" id="uemail" class="" autocorrect="off" autocapitalize="off" autofocus="">
                                    <small>We will send an OTP code to your email for verification</small>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="customerpassword">Password</label>
                                    <input type="password" value="" name="customerpassword" placeholder="" id="customerpassword" class="customerpassword">   
                                    <i class="fa-solid fa-eye" id="showFirst"></i> <!--for the eye icon-->   
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" value="" name="password_confirmation" placeholder="" id="password_confirmation" class="password_confirmation">   
                                    <i class="fa-solid fa-eye" id="showSecond"></i> <!--for the eye icon-->                        	
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12" style="padding-top:20px;">
                                <input type="submit" class="btn mb-3" value="Create" name="signup">
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

      <!-- register validation -->
      <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>
      <script src="assets/js/validation.js" defer></script>

       <!--show/hide password-->
        <script>
         var inputF = document.querySelector('#customerpassword');
         var showF = document.querySelector('#showFirst');
         showF.addEventListener('click', active);
         function active(){
          this.classList.toggle("fa-eye-slash");
          const type = inputF.getAttribute("type")
          === "password" ? "text" : "password";
          inputF.setAttribute("type", type);
         }
        </script>
        <script>
         var inputS = document.querySelector('#password_confirmation');
         var showS = document.querySelector('#showSecond');
         showS.addEventListener('click', active);
         function active(){
          this.classList.toggle("fa-eye-slash");
          const type = inputS.getAttribute("type")
          === "password" ? "text" : "password";
          inputS.setAttribute("type", type);
         }
        </script>
</div>
</body>
</html>