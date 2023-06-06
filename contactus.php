<?php
include "header.php";
include "connect.php";
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- belle/contact-us.html   11 Nov 2019 12:44:39 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Contact Us &ndash; BRich Bookstore</title>
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
    .alert
    { 
      height:45px;
      width: 588px;
      text-align: center;
      font-size:15px;
      font-weight: 500;
    }
</style>
</head>
<body class="contact-template page-template belle">
<div class="pageWrapper">
    
    <!--Body Content-->
    <div id="page-content">
    	<!--Page Title-->
    	<div class="page section-header text-center">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width" style="padding-top: 60px">Contact Us</h1></div>
      		</div>
		</div>
        <!--End Page Title-->
        <div class="bredcrumbWrap">
            <div class="container breadcrumbs">
                <a href="index.php" title="Back to the home page">Home</a><span aria-hidden="true">›</span><span>Contact Us</span>
            </div>
        </div>

        <?php 
        if(isset($_SESSION['user_id']) && $_SESSION['verify'] == 1)
        {
            $sql = "select * from users where id = '".$_SESSION['user_id']."'";
            
            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_assoc($result))
            {
                $email = $row['email'];
            }
        }
        ?>
        
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
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
                            ?>
                    </div>
                	<h2>Drop Us A Line</h2>
                    <p style="font-size:15px;">At BRich Bookstore, your satisfaction is our priority.</p>   
                    <p>Required fields are marked with an asterisk (*)</p>                 	
                    <div class="formFeilds contact-form form-vertical">
                      <form action="contactus_code.php" method="post"  id="contact_form" class="contact-form">	
                      <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        	<div class="form-group">
                          	<input type="text" id="ContactFormName" name="fname" placeholder="Name*" value="" required="" spellcheck="false">
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        	<div class="form-group">
							<input type="email" id="ContactFormEmail" name="uemail" placeholder="Email*" value="<?php if(isset($email)) echo $email?>" required="" autocorrect="off" autocapitalize="off">                        	
                            </div>
                        </div>
                      </div>
                      <div class="row">
                          <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          	<div class="form-group">
                            <input required="" type="text" id="ContactSubject" name="subject" placeholder="Subject*" maxlength="400" value="">
                            </div>
                          </div>
                          <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          	<div class="form-group">
                            <input type="text" id="ordernum" name="ordernum" placeholder="Order Number If Related" value="" autocomplete="off" pattern="[0-9]" >
                            </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        	<div class="form-group">
                            <textarea required="" rows="10" id="ContactFormMessage" name="message" placeholder="Your Message*" maxlength="3500"></textarea>
                                <div id="the-count">
                                    <span id="current">0</span>
                                    <span id="maximum">/ 3500</span>
                                </div>
                            </div>
                        </div>  
                      </div>
                      <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="submit" class="btn" value="Send Message">
                        </div>
                     </div>
                     </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!--End Body Content-->
    
    <!--Footer-->
    <?php include "footer.php"?>
    <!--End Footer-->
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

     <script>
    $('textarea').keyup(function() {
    
        var characterCount = $(this).val().length,
            current = $('#current'),
            maximum = $('#maximum'),
            theCount = $('#the-count');
        
            current.text(characterCount);
   
    
        /*This isn't entirely necessary, just playin around*/
        if (characterCount < 700) {
        current.css('color', '#666');
        }
        if (characterCount > 700 && characterCount < 900) {
        current.css('color', '#6d5555');
        }
        if (characterCount > 900 && characterCount < 1000) {
        current.css('color', '#793535');
        }
        if (characterCount > 1000 && characterCount < 1200) {
        current.css('color', '#841c1c');
        }
        if (characterCount > 1200 && characterCount < 2690) {
        current.css('color', '#8f0001');
        }
        
        if (characterCount >= 2700) {
        maximum.css('color', '#8f0001');
        current.css('color', '#8f0001');
        theCount.css('font-weight','bold');
        } else {
        maximum.css('color','#666');
        theCount.css('font-weight','normal');
        }
    
    });
    </script>
</div>
</body>

<!-- belle/contact-us.html   11 Nov 2019 12:44:39 GMT -->
</html>