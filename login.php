<?php
ob_start();
include "header.php";
include "connect.php";

//remember me
if(isset($_COOKIE['emailid']) && isset($_COOKIE['password']))
{
    $emailid = $_COOKIE['emailid'];
    $password = $_COOKIE['password'];
}
else{
    $emailid = $password = "";
}
$is_invalid = false;

if($_SERVER["REQUEST_METHOD"] === "POST"){
  $sql = sprintf("SELECT * FROM users 
                  WHERE email = '%s'",
                  $conn->real_escape_string($_POST['uemail']));
    
  $result = mysqli_query($conn,$sql);
  $user = mysqli_fetch_assoc($result);

  if($user){
    if(password_verify($_POST['password'], $user['password_hash']))
    {
      session_start();

      session_regenerate_id();

      $_SESSION['user_id'] = $user['id'];
      
      //remember me
      if(isset($_REQUEST['remember_me']))
      {
        setcookie('emailid', $_REQUEST['uemail'], time()+ (60*60*24) * 7);
        setcookie('password', $_REQUEST['password'], time()+ (60*60*24) * 7);
      }
      header("Location: index.php");
      exit(0);
    }
  }
    $is_invalid = true;
}

if(isset($_SESSION['user_id'])){
   $sql = "SELECT * FROM users
   WHERE id = {$_SESSION['user_id']}";

   $result = mysqli_query($conn, $sql);

   $user = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Account &ndash; BRICH Bookstore</title>
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

<link rel="stylesheet" href="assets/css/drp.css">

<style>
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

input[type=checkbox]{
    position: relative;
    cursor:pointer;
    accent-color:#555555;
}

label.rem{
    padding-left: 8px;
    cursor:pointer;
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
        		<div class="wrapper"><h1 class="page-width" style="padding-top: 60px">Login</h1></div>
      		</div>
		</div>
        <!--End Page Title-->
        
        <div class="container">
        	<div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
                	<div class="mb-4">
                        <form method="post" action="#" id="CustomerLoginForm" accept-charset="UTF-8" class="contact-form">	
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="invalid">
                                            <?php if($is_invalid):?>
                                            <em>Invalid Login. Wrong email or password.</em>
                                            <?php endif; ?>
                                        </div>

                                        <div class ="reset">
                                            <?php 
                                                if(isset($_SESSION['success']))
                                                {
                                                    ?>
                                                    <div class="alert alert-success">
                                                    <?= $_SESSION['success'];?>
                                                    </div>
                                                    <?php
                                                    unset($_SESSION['success']);
                                                }
                                            ?>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="uemail">Email</label>
                                            <input type="email" name="uemail" placeholder="" id="CustomerEmail" class="" autocorrect="off" autocapitalize="off" autofocus=""
                                            value = "<?php if(isset($emailid)){echo $emailid;} 
                                            else{ htmlspecialchars( $_POST['uemail'] ?? "");} ?>">
                                            <!--to keep the content if the user type wrong password-->
                                        </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                    <label for="CustomerPassword">Password</label>
                                    <input type="password" value="<?php if(isset($password)) echo $password?>" name="password" placeholder="" id="CustomerPassword" class="pswrd">      
                                    <i class="fa-solid fa-eye" id="show"></i> <!--for the eye icon-->    
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                    <input type="checkbox" class="remember_me" value="remember_me" id="remember_me" name="remember_me">
                                    <label for="remember_me" class="rem">Remember me</label>
                                    </div>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12" style="padding-top:30px;">
                                        <input type="submit" class="btn mb-3" value="Sign In" name="submit">
                                        <p class="mb-4">
									    <a href="forgotemail.php" id="RecoverPassword">Forgot your password?</a> &nbsp; | &nbsp;
								        <a href="register.php" id="customer_register_link">Create account</a>
                                        </p>
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
    include("footer.php")
    ?>
    
    <!--Scoll Top-->
    <span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
    <!--End Scoll Top-->
    
    
     <script src="assets/js/main.js"></script>

     <!--show/hide password-->
     <script>
         var input = document.querySelector('.pswrd');
         var show = document.querySelector('#show');
         show.addEventListener('click', active);
         function active(){
          this.classList.toggle("fa-eye-slash");
          const type = input.getAttribute("type")
          === "password" ? "text" : "password";
          input.setAttribute("type", type);
         }
      </script>
</div>
        
</body>
</html>