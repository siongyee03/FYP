<?php

session_start();
include "connect.php";

if(isset($_SESSION['user_id'])){
   $sql = "SELECT * FROM users
   WHERE id = {$_SESSION['user_id']}";

   $result = mysqli_query($conn, $sql);

   $user = mysqli_fetch_assoc($result);

   $_SESSION['verify'] = $user['verify_status'];
}


?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<!-- belle/index.html   11 Nov 2019 12:16:10 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
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
    <link rel="stylesheet" href="assets/css/drp.css">
</head>

    <div id="pre-loader">
        <img src="assets/images/loader.gif" alt="Loading..." />
    </div>
<div class="pageWrapper" >
    <!--Search Form Drawer-->
    <div class="search">
        <div class="search__form">
            <form class="search-bar__form" action="product.php" method="GET">
                <button class="go-btn search__button" type="submit"><i class="icon anm anm-search-l"></i></button>
                <input class="search__input" type="search" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>" placeholder="Search entire store..." aria-label="Search" autocomplete="off">
            </form>
            <button type="button" class="search-trigger close-btn"><i class="anm anm-times-l"></i></button>
        </div>
    </div>
    <!--End Search Form Drawer-->
    <!--Top Header-->
    <div class="top-header">
        <div class="container-fluid">
            <div class="row">
            	<div class="col-10 col-sm-8 col-md-5 col-lg-4">
                    
                    <p class="phone-no"><i class="anm anm-phone-s"></i> 1-300-80-06683</p>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4 d-none d-lg-none d-md-block d-lg-block">
                	<div class="text-center"><p class="top-header_middle-text"> BRich Bookstore</p></div>
                </div>

                <div class="col-2 col-sm-4 col-md-3 col-lg-4 text-right">
                <nav class="grid__item" id="AccessibleNav" role="navigation">
                    <ul id="siteNavheader" class="site-nav medium right hidearrow">
                    <?php if(isset($user) && $user['verify_status']!=0): ?>
                    <li class="lvl1 parent megamenu"><a href="#">Welcome <?= htmlspecialchars($user['username']) ?></a>
                    <ul class="dropdown" >
                    <li><a href="cart.php" class="site-nav">My Cart<i class="anm anm-angle-right-l"></i></a></li>
                    <li><a href="order-history.php" class="site-nav">My Order<i class="anm anm-angle-right-l"></i></a></li>
                    <li><a href="userprofile.php" class="site-nav">My Profile<i class="anm anm-angle-right-l"></i></a></li>
                        <?php if(isset($user)): ?>
                        <li><a href="logout.php" onclick="return confirm('Are you sure you want to log out?')">Log Out<i class="anm anm-angle-right-l"></i></a></li>
                        <?php endif; ?>   
                    </ul>
                    <li class="lvl1 parent megamenu"><a href="wishlist.php">Wishlist</a>
                    </li>
                    <?php elseif(isset($user) && $user['verify_status']==0): ?>
                        <li><a href="signup_sendemailverify.php">Verify Email</a> </li>
                        <li><a href="register.php">Create Account</a></li>
                    <?php else: ?>
                     <li><a href="login.php">Login</a> </li>
                     <li><a href="register.php">Create Account</a></li>
                     <?php endif; ?>
                    </ul>
                    </nav>
                </div>
            </div>
            
        </div>
    </div>
    <!--End Top Header-->
    <!--Header-->
    <div class="header-wrap classicHeader animated d-flex">
        <div class="container-fluid">        
            <div class="row align-items-center">
                <!--Desktop Logo-->
                <div class="logo col-md-2 col-lg-2 d-none d-lg-block">
                    <!--<a href="index.php">
                    	<img src="assets/images/logo.jpeg" alt="BRich Bookstore" title="BRich Bookstore" />
                    </a>-->
                </div>
                <!--End Desktop Logo-->
                <div class="col-2 col-sm-3 col-md-3 col-lg-8">
                	<div class="d-block d-lg-none">
                        <button type="button" class="btn--link site-header__menu js-mobile-nav-toggle mobile-nav--open">
                        	<i class="icon anm anm-times-l"></i>
                            <i class="anm anm-bars-r"></i>
                        </button>
                    </div>
                    <!--Desktop Menu-->
                	<nav class="grid__item" id="AccessibleNav" role="navigation"><!-- for mobile -->
                        <ul id="siteNav" class="site-nav medium center hidearrow">
                            <li class="lvl1 parent megamenu"><a href="index.php">Home <i class="anm anm-angle-down-l"></i></a>
                            </li>
                            
                            <li class="lvl1 parent megamenu"><a href="product.php">Product <i class="anm anm-angle-down-l"></i></a>
                            </li>

                            <li class="lvl1 parent dropdown"><a href="about-us.php">About Us <i class="anm anm-angle-down-l"></i></a>
                            </li>

                            <li class="lvl1 parent dropdown"><a href="contactus.php">Contact Us <i class="anm anm-angle-down-l"></i></a>
                            </li>
                      </ul>
                    </nav>
                    <!--End Desktop Menu-->
                </div>

                <!--Mobile Logo-->
                <div class="col-6 col-sm-6 col-md-6 col-lg-2 d-block d-lg-none mobile-logo">
                	<div class="logo">
                        <a href="index.php">
                            <!--<img src="assets/images/logo.svg" alt="Belle Multipurpose Html Template" title="Belle Multipurpose Html Template" />-->
                        </a>
                    </div>
                </div>
                <!--Mobile Logo-->
                
                <?php
                    $subtotal = 0;
                    //if user did not login
                    if(!isset($_SESSION['user_id']) || $user['verify_status']==0){
                 ?>
                    <div class="col-4 col-sm-3 col-md-3 col-lg-2">
                        <div class="site-cart">
                            <a href="#" class="site-header__cart" title="Cart">
                            <i class="icon anm anm-bag-l"></i>
                            </a>
                            <!--Minicart Popup-->
                            <div id="header-cart" class="block block-cart">
                          
                            <div class="total">
                                <div class="total-in">
                                    <span class="label">Cart Subtotal:</span><span class="product-price"><span class="money">RM<?php echo $subtotal; ?></span></span>
                                </div>
                                
                                 <div class="buttonSet text-center">
                                    <a href="cart.php" class="btn btn-secondary btn--small">View Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }else{
                    $uid = $_SESSION['user_id'];
                    $sql = "select * from cart join books on books.book_id = cart.bid and uid = '$uid'";
                    $result = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($result);
                                
                ?>

                <div class="col-4 col-sm-3 col-md-3 col-lg-2">
                    <div class="site-cart">
                        <a href="#" class="site-header__cart" title="Cart">
                            <i class="icon anm anm-bag-l"></i>
                            <span id="CartCount" class="site-header__cart-count" data-cart-render="item_count"><?php echo $count?></span>
                        </a>
                        <!--Minicart Popup-->
                       
                        <div id="header-cart" class="block block-cart">
                            <form action="#" method="get">
                                
                            <?php
                                while($row = mysqli_fetch_assoc($result)){
                                ?>
                            <ul class="mini-products-list">
                            
                                <li class="item">
                                    <a class="product-image" href="product-details.php?book_id=<?php echo $row['book_id'];?>">
                                        <img src="assets/images/<?php echo $row['book_image'];?>" alt="<?php echo $row['book_title']; ?>" title="" />
                                    </a>
                                    <div class="product-details">
                                        <a href="delcart.php?uid=<?php echo $_SESSION['user_id'];?>&bid=<?php echo $row['book_id'];?>" class="remove"><i class="anm anm-times-l" aria-hidden="true"></i></a>
                                        <a href="cart.php" class="edit-i remove"><i class="anm anm-edit" aria-hidden="true"></i></a>
                                        <a class="pName" href="product-detail.php?book_id=<?php echo $row['book_id'];?>"><?php echo $row['book_title'];?></a>
                                        <div class="variant-cart"> <?php echo $row['book_publisher']?></div>
                                        <div class="wrapQtyBtn">
                                            <div class="qtyField">
                                                <span class="label">Qty:</span> 
                                                <div id="Quantity" name="quantity" class="label"><?php echo $row['qty']?></div>
                                            </div>
                                        </div>
                                        <div class="priceRow">
                                            <div class="product-price">
                                                <span class="money">RM<?php echo $row['book_price'] * $row['qty'];?></span>
                                            </div>
                                         </div>
                                    </div>
                                </li>
                            </ul>
                            <?php
                            $subtotal = $subtotal +  ($row['book_price'] * $row['qty']);
                                }
                                ?>
                            </form>
                            
                            
                            <div class="total">
                            <?php if($count != 0) : ?>
                                <div class="total-in">
                                    <span class="label">Cart Subtotal:</span><span class="product-price"><span class="money">RM<?php echo $subtotal; ?></span></span>
                                </div>
                                 <div class="buttonSet text-center">
                                    <a href="cart.php" class="btn btn-secondary btn--small">View Cart</a>
                                    <a href="checkout.php" class="btn btn-secondary btn--small">Checkout</a>
                                </div>
                            <?php else:?>
                                <div class="buttonSet text-center" style="padding-top:15px;">
                                    <a href="product.php" class="btn btn-secondary btn--small">Add Product</a>
                                </div>
                            <?php endif; ?>
                            </div>
                            
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                    <!--EndMinicart Popup-->
                   
                    <div class="site-header__search">
                        <button type="button" class="search-trigger"><i class="icon anm anm-search-l"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Header-->
    <!--Mobile Menu-->
    <div class="mobile-nav-wrapper" role="navigation">
		<div class="closemobileMenu"><i class="icon anm anm-times-l pull-right"></i> Close Menu</div>
        <ul id="MobileNav" class="mobile-nav">
        	<li class="lvl1 parent megamenu"><a href="index.php">Home</a>
            </li>
        	
        	<li class="lvl1 parent megamenu"><a href="product.php">Product</i></a>
           </li>

           <li class="lvl1 parent megamenu"><a href="about-us.php">About Us</i></a>
           </li>

           <li class="lvl1 parent megamenu"><a href="contactus.php">Contact Us</i></a>
           </li>
        </ul>
	</div>
	<!--End Mobile Menu-->
    <!-- Including Jquery -->
     <script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
     <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
     <script src="assets/js/vendor/jquery.cookie.js"></script>
     <script src="assets/js/vendor/wow.min.js"></script>
     <!-- Including Javascript -->
     <script src="assets/js/bootstrap.min.js"></script>
     <script src="assets/js/plugins.js"></script>
     <script src="assets/js/popper.min.js"></script>
     <script src="assets/js/lazysizes.js"></script>
    
     <!--For Newsletter Popup-->
     <script>
        jQuery(document).ready(function(){  
          jQuery('.closepopup').on('click', function () {
              jQuery('#popup-container').fadeOut();
              jQuery('#modalOverly').fadeOut();
          });
          
          var visits = jQuery.cookie('visits') || 0;
          visits++;
          jQuery.cookie('visits', visits, { expires: 1, path: '/' });
          console.debug(jQuery.cookie('visits')); 
          if ( jQuery.cookie('visits') > 1 ) {
            jQuery('#modalOverly').hide();
            jQuery('#popup-container').hide();
          } else {
              var pageHeight = jQuery(document).height();
              jQuery('<div id="modalOverly"></div>').insertBefore('body');
              jQuery('#modalOverly').css("height", pageHeight);
              jQuery('#popup-container').show();
          }
          if (jQuery.cookie('noShowWelcome')) { jQuery('#popup-container').hide(); jQuery('#active-popup').hide(); }
        }); 
        
        jQuery(document).mouseup(function(e){
          var container = jQuery('#popup-container');
          if( !container.is(e.target)&& container.has(e.target).length === 0)
          {
            container.fadeOut();
            jQuery('#modalOverly').fadeIn(200);
            jQuery('#modalOverly').hide();
          }
        });
    </script>
</div>

</html>
