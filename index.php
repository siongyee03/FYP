<?php
ob_start();
include("header.php");
include("connect.php");

?>
<title>index &ndash; BRich Bookstore</title>
    <!--Body Content-->
    <div id="page-content">
    	<!--Home slider-->
    	<div class="slideshow slideshow-wrapper pb-section sliderFull">
        	<div class="home-slideshow">
            	<div class="slide">
                	<div class="blur-up lazyload bg-size">
                        <img src="assets/images/book 2.jpg" alt="Shop Our New Collection" title="Shop Our New Collection" />
                        <div class="slideshow__text-wrap slideshow__overlay classic bottom">
                            <div class="slideshow__text-content bottom">
                                <div class="wrap-caption center">
                                        <h2 class="h1 mega-title slideshow__title">Welcome to our bookstore</h2>
                                        <span class="mega-subtitle slideshow__subtitle">From Hight to low, classic or modern. We have you covered</span>
                                        <a href="product.php" class="btn">Shop now</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide">
                	<div class="blur-up lazyload bg-size">
                        <img src="assets/images/book 1.jpg" alt="BRich Bookstore" title="BRich Bookstore" />
                        <div class="slideshow__text-wrap slideshow__overlay classic bottom">
                            <div class="slideshow__text-content bottom">
                                <div class="wrap-caption center">
                                    <h2 class="h1 mega-title slideshow__title">Welcome to our bookstore</h2>
                                    <span class="mega-subtitle slideshow__subtitle">Quality Books for Quality Education</span>
                                    <a href="product.php" class="btn">Shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Home slider-->

      <!--Collection Tab slider-->
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div id="tab1" class="tab_content grid-products">
                        <header class="section-header">
                            <h2 class="section-header__title text-center h2"><span>Revision Books</span></h2>
                        </header>
                        <div class="productSlider"> 
                            
                        
						    <?php
                            $books = "SELECT * from books where cat_id=1";
                            $books_run = mysqli_query($conn, $books);

                            if(mysqli_num_rows($books_run) > 0)
                            {
                                foreach($books_run as $row)
                                {
                			        $book_id = $row['book_id'];
                			        $book_title = $row['book_title'];
                			        $book_image = $row['book_image'];
                			        $book_price = $row['book_price'];
              		        ?>
                                <div class="col-20 item">
                                <!-- start product image -->
                                    <div class="product-image" action="product-detail.php?book_id=<?= $book_id;?>" method="post">
                                        <a href="product-detail.php?book_id=<?= $book_id;?>">
                                            <img src="assets/images/<?= $book_image ?>"  alt="image" title="product">>
                                        </a>

                                <!-- Start product button -->
                                    <form class="variants add" action="addtocart.php?book_id=<?= $book_id;?>" onclick="window.location.href='cart.php'"method="post">
                                        <button type="submit" name="cart" value="<?= $book_id; ?>" class="btn btn-sm btn-primary">Add to cart</button>
                                    </form>
                                    <!-- end product button -->
                                </div>

                                <!--start product details -->
                                <div class="product-details text-center">
                                    <!-- product name -->
                                    <div class="product-name">
                                        <a href="product-detail.php?book_id=<?= $book_id;?>"><?= $book_title?></a> 
                                    </div>
                                    <!-- End product name -->
                                    <!-- product price -->
                                    <div class="product-price">
                                        <span class="price">RM<?= $book_price ?></span>
                                    </div>
                                    <!-- End product price -->
                                </div>
                                <!-- End product details -->
                            </div>

                            <?php
                                }
                            }

                            else
                            {
                                echo "No data available";
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

            <!--Collection Box slider-->
       
            <div class="collection-box section">
         <div class="container-fluid">
         <h3 class="section-header__title text-center h2"><span>Category</span></h3><br>
             <div class="collection-grid">
					<?php
                        $cat = "SELECT * from category";
                        $cat_run = mysqli_query($conn, $cat);

                        if(mysqli_num_rows($cat_run) > 0)
                        {
                            foreach($cat_run as $row)
                            {
                			    $cat_id = $row['cat_id'];
                			    $cat_title = $row['cat_title'];
                			    $cat_image = $row['cat_image'];
              		        ?>

                        <div class="collection-grid-item">
                            <a href="product.php" class="collection-grid-item__link">
                            <img src="assets/images/<?= $cat_image ?>" alt="book" class="blur-up lazyload" height=250>
                                <div class="collection-grid-item__title-wrapper">
                                    <h3 class="collection-grid-item__title btn btn--secondary no-border"><?= $cat_title?></h3>
                                </div>
                            </a>
                        </div>   
                    <?php
                            }
                        }
                    ?>
                </div>
            </div>
    </div>
    <!--End Collection Box slider-->

    <hr>

        <!--Store Feature-->
        <div class="store-feature section">
        	<div class="container">
            	<div class="row">
                	<div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    	<ul class="display-table store-info">
                        	<li class="display-table-cell">
                            	<i class="icon anm anm-truck-l"></i>
                            	<h5>Free Shipping &amp; Return</h5>
                            	<span class="sub-text">Free shipping on all US orders</span>
                            </li>
                          	<li class="display-table-cell">
                            	<i class="icon anm anm-dollar-sign-r"></i>
                                <h5>Money Guarantee</h5>
                                <span class="sub-text">30 days money back guarantee</span>
                          	</li>
                          	<li class="display-table-cell">
                            	<i class="icon anm anm-comments-l"></i>
                                <h5>Online Support</h5>
                                <span class="sub-text">We support online 24/7 on day</span>
                            </li>
                          	<li class="display-table-cell">
                            	<i class="icon anm anm-credit-card-front-r"></i>
                                <h5>Secure Payments</h5>
                                <span class="sub-text">All payment are Secured and trusted.</span>
                        	</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--End Store Feature-->

<?php
include("footer.php")
?>

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
     <script src="assets/js/main.js"></script>
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
    <!--End For Newsletter Popup-->

</body>
</html>