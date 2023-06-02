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
              }else{?>          
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
                  <div class="mb-4">
                        <form id="addfrm" class="contact-form" name="addfrm" method="POST" action="editaddress.php" accept-charset="UTF-8" enctype="multipart/form-data">
                        <?php
                            $uid = $_SESSION['user_id'];

                            mysqli_select_db($conn, "bookstore");
                            $sql = "select * from users where id = '$uid'";
            
                            $result = mysqli_query($conn, $sql);
            
                            if($result){
                                while($user = mysqli_fetch_assoc($result)){
                                  ?>
                                  
                        <!-- Address -->
                          <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                              <div class="form-group">
                                <label class="form-control-label" for="input-address">Address</label>
                                <input type="text" id="input-address" name="address"  spellcheck="false" required="" placeholder="67 JLN BADIK 1 TAMAN SRI TEBRAU" value="<?=$user['ship_address'];?>" >
                              </div>
                            </div>
                          </div>
                   
                          <div class="row">
                              <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                                <div class="form-group">
                                  <label class="form-control-label" for="input-city">City</label>
                                  <input type="text" id="input-city" name="city" placeholder="Johor Bahru" pattern="[A-Za-z\s]+" value="<?= $user['city']; ?>" required="">
                                </div>
                              </div>

                              <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                                <div class="form-group">
                                  <label class="form-control-label" for="input-state">State</label>
                                  <select id="input-state" name="state" required>
                                    <option <?php if(isset($user['states'])){?>value = "<?= $user['states'];?>" <?php }else?>value="">
                                    <?php if(isset($user['states'])){echo $user['states'];}
                                    else{?>Select a state<?php }?></option>
                                    <option value ="Johor">Johor</option>
                                    <option value ="Malacca">Malacca</option>
                                    <option value ="Kedah">Kedah</option>
                                    <option value ="Kelantan">Kelantan</option>
                                    <option value ="Negeri Sembilan">Negeri Sembilan</option>
                                    <option value ="Pahang">Pahang</option>
                                    <option value ="Penang">Penang</option>
                                    <option value ="Perak">Perak</option>
                                    <option value ="Perlis">Perlis</option>
                                    <option value ="Sabah">Sabah</option>
                                    <option value ="Sarawak">Sarawak</option>
                                    <option value ="Selangor">Selangor</option>
                                    <option value ="Terengganu">Terengganu</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                                <div class="form-group">
                                  <label class="form-control-label" for="input-postal">Postal code</label>
                                  <input type="text" id="input-postal-code" name="postal" pattern="[0-9]{5}" 
                                   placeholder="80050" value="<?= $user['postal'];?>" required="">
                                </div>
                              </div>
                            </div>

                        <!-- Password -->
                        <!--
                        <div class="pl-lg-4">
                          <div class="row">
                            <div class="col-lg-6">
                              <div class="form-group focused">
                                <label class="form-control-label" for="input-password">Password</label>
                                <input type="password" id="input-password" name="password" class="form-control form-control-alternative" placeholder="">
                              </div>
                            </div>
                          </div>
                                -->
                                
                            <div class="row">
                                <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12" style="padding-top:100px;">
                                    <input type="submit" class="btn mb-3" name="savebtn" id="addfrm" value="update">
                                </div>
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
    
     <!-- Including Jquery -->
     <script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
     <script src="assets/js/vendor/jquery.cookie.js"></script>
     <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
     <script src="assets/js/vendor/wow.min.js"></script>
     <!-- Including Javascript -->
     <script src="assets/js/main.js"></script>
<!--
     <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>
     <script src="assets/js/editadd.js" defer></script>-->
</div>


</body>

<!-- belle/faqs.html   11 Nov 2019 12:44:40 GMT -->
</html>