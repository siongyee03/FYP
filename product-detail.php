<?php
include ("header.php");
include("connect.php");
?>

<style>
.spr-container {
  min-height: 10px;
  max-width: 1200px;
  margin: 0 auto;
  float: none;
  padding: 0 15px !important;
  width: 100%;
  font-size: inherit;
  box-sizing: border-box;
  overflow: hidden;
}
.spr-icon {
  color: #fdbc00;
  font-size: 120%;
  position: relative;
  width: 1.3em;
  height: 1.3em;
}
.spr-summary-actions-newreview {
  float: right;
  border: 1px solid;
  border-radius: 5px;
  padding: 5px;
  margin-right: 24px;
}

.spr-review {
  width: 31%;
  margin: 0 1% !important;
  min-height: 250px;
  display: inline-block;
  float: left;
  padding: 20px 25px !important;
  /*background: #fff;*/
  margin-bottom: 25px !important;
  border: 1px solid;
  border-radius: 12px;
}

.spr-pagination {
  clear: both;
}
#shopify-product-reviews .spr-review-header-title {
  display: block;
  clear: both;
  float: none;
}
@media (max-width: 800px) {
  .spr-review {
    float: none;
    width: 100%;
    min-height: auto;
    margin: 0 !important;
    margin-bottom: 25px !important;
  }
  .spr-summary-actions-newreview {
    margin-right: 0px;
  }
}
</style>

<style>
.outofstock2:before {
	content: "";
	background: rgba(255,255,255,0.5);
	width: 100%;
	height: 100%;
	position: absolute;
	left: 0; top: 0;
}

.outofstock2:after {
	content: "OUT OF STOCK";
	position: absolute;
	background: rgba(255, 255, 255, 0.9);
	border-radius: 100%;
	text-align: center;
	width: 70px;
	height: 70px;
	top: calc(50% - 35px);
	left: calc(50% - 35px);
	font-size: 0.8em;
	font-weight: bold;
	display: flex;
	align-items: center;
}
</style>

<style>
    table .outstock
    {
    -moz-user-select:none; -ms-user-select:none; -webkit-user-select:none; user-select:none; -webkit-appearance:none; -moz-appearance:none; appearance:none; 
    display:inline-block; width: 100%;; height:auto;
	text-decoration:none; text-align:center; vertical-align:middle; cursor:default; border:1px solid transparent; border-radius:0;padding:8px 15px 8px;
    background-color:grey; color:#fff; font-family:Poppins,Helvetica,Tahoma,Arial,sans-serif; 
	font-weight:500; text-transform:uppercase; letter-spacing:1px; line-height:normal; white-space:normal; font-size:20px;
    }

    .outofstock 
    {
        color: red;
    }

</style>

<body class="template-product belle">
	<div class="pageWrapper">
        <!-- Breadcrumb -->
        <div class="bredcrumbWrap" style="padding-top: 50px;">
            <div class="container breadcrumbs">
                <a href="index.php" title="Back to the home page">Home</a><span aria-hidden="true">›</span>
                <a href="product.php" title="Back to the product page">Product</a><span aria-hidden="true">›</span>
                <?php

                if (isset($_GET['book_id'])) {
                    $book_id = $_GET['book_id'];

                    // Retrieve the book title from the database
                    $sql = "SELECT book_title FROM books WHERE book_id = $book_id";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $book_title = $row['book_title'];

                    // Display the book title in the breadcrumb
                    echo $book_title;
                }
                ?>
            </div>
        </div>
        <!-- End Breadcrumb -->
    <!-- Rest of the content -->
    </div>
<!-- End Body Content -->
 
<?php
if (isset($_GET['book_id'])) {
    $book_id = $_GET['book_id'];
    $sqlbooks = "SELECT * FROM books WHERE book_id = $book_id";
} else {
    $sqlbooks = "SELECT * FROM books";
}
    $getbooks = mysqli_query($conn, $sqlbooks);

    $row_books = mysqli_fetch_assoc($getbooks);
    $book_isbn = $row_books['book_isbn'];
    $book_title = $row_books['book_title'];
    $book_image = $row_books['book_image'];
    $book_description = $row_books['book_description'];
    $book_author = $row_books['book_author'];
    $book_price = $row_books['book_price'];
    $book_publisher = $row_books['book_publisher'];
    $book_formal = $row_books['book_format'];
    $stock = $row_books['stock'];
?>

            <div id="ProductSection-product-template" class="product-template__container prstyle1 container">
                <div class="container px-5 px-lg-5 my-5">
                    <div class="row gx-5 gx-lg-5">
                        <div class="col-md-5">
                            <img src="assets/images/<?= $book_image ?>" alt="product" style="width: 100%; height: auto;">
                        </div>
                        <div class="col-lg-6 col-md-7 col-sm-12 col-12">
                            <div class="product-single__description rte">
                                <div class="product-single__meta">
                                  <h1 class="product-single__title"><?= $book_title ?></h1>
                                  <div class="prInfoRow">
                                    <?php
                                    if(($stock)==0)
                                    {
                                        echo'<div class="product-stock"><span class="outofstock">Out Of Stock</span></div>';
                                       
                                    }
                                    else
                                    {
                                        echo'<div class="product-stock"> <span class="instock ">In Stock </span></div>'; 
                                    }
                                    ?>
                                    <span class="product-review">
                                        <span class="reviewLink">
                                            <?php
                                            // Retrieve the total number of reviews for the book_id from the database
                                            $book_id = $_GET['book_id'];
                                            $sql = "SELECT COUNT(*) AS total_reviews FROM review WHERE book_id = $book_id";
                                            $result = mysqli_query($conn, $sql);
                                            $row = mysqli_fetch_assoc($result);
                                            $totalReviews = $row['total_reviews'];

                                            // Generate star ratings based on the total number of reviews
                                            $overloadRating = $totalReviews;
                                            for ($i = 1; $i <= 5; $i++) {
                                                if ($i <= $overloadRating) {
                                                    echo '<i class="font-13 fa fa-star"></i>';
                                                } else {
                                                    echo '<i class="font-13 fa fa-star-o"></i>';
                                                }
                                            }
                                            ?>
                                        </span>
                                            <span class="spr-summary-actions-togglereviews"><?php echo $totalReviews; ?> reviews</span>
                                    </span>
                                </div>
                                  <p class="product-single__price product-single__price-product-template">
                                    <span class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                                    <span id="ProductPrice-product-template"><span class="money">RM <?= $book_price ?></span></span>
                                  </p>

                                  <div class="product-single__description rte">
                                    <ul>
                                      <b>Product Detail:</b>
                                      <li><b>Publisher:</b> <?= $book_publisher?></li>
                                      <li><b>Author:</b> <?= $book_author ?></li>
                                      <li><b>ISBN:</b> <?= $book_isbn ?></li>
                                      <li><b>Format:</b> <?= $book_formal ?></li>
                                    </ul>
                                  </div>

                                  <div class="spr-review-content">
                                    <p class="spr-review-content-body"><b>Description:</b><br> <?= $book_description ?></p>
                                  </div>

                                 
                                    <?php
                                    if ($stock > 0 && $stock < 20) {
                                        echo '<div id="quantity_message">Hurry! Only <span class="items">' . $stock . '</span> left in stock.</div>';
                                    }
                                    else if($stock > 20) { 
                                        echo '<div id="quantity_message">Hurry! <span class="items">' . $stock . '</span> left in stock.</div>';
                                    }
                                    ?>

                                    <!-- Product Action -->
                                    <div class="product-action clearfix">
                                     <form action="addtocart.php?book_id=<?php echo $row_books['book_id'];?>" method="get" accept-charset="UTF-8">
                                      <div class="product-form__item--quantity">
                                          <div class="wrapQtyBtn">
                                              <div class="qtyField">
                                                <a class="qtyBtn minus" href="javascript:void(0);"><i class="fa anm anm-minus-r"></i></a>
                                                  <input type="text" id="quantity" name="quantity" value="1" class="product-form__input qty">
                                                <a class="qtyBtn plus" href="javascript:void(0);"><i class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                                              </div>
                                          </div>
                                      </div>

                                      <div class="product-form__item--submit">
                                      <div class="product-subtotal text-center">
                                      <table>
                                                    <tr>
                                        <?php if ($stock <= 0): ?>
                                                            <td>
                                                                <div class="outstock">Out of Stock</div>
                                                            </td>
                                                        <?php else: ?>
                                                            <td>
											<input type="hidden" name="book_id" value="<?= $book_id; ?>">
                                            <button type="submit" name="cart" value="<?= $book_id; ?>" class="btn product-form__cart-submit"> Add to cart</button> 
                                            </table>
                                            </div>
                                        </div>
                                    </form>

                                    <form class="shopify-payment-button" action="buynow_checkout.php" method="post" onsubmit="storeQuantity()">
                                        <div class="shopify-payment-button" data-shopify="payment-button">
                                            <input type="hidden" name="book_id" value="<?= $book_id; ?>">
                                            <input type="hidden" name="book_title" value="<?= $book_title; ?>">
                                            <input type="hidden" name="quantity" id="quantityInput" value="<?= isset($qty) ? $qty : ''; ?>">
                                            <button type="submit" class="shopify-payment-button__button shopify-payment-button__button--unbranded" name="buyitnow">Buy it now</button>
                                        </div>
                                    </form>

                                    <script>
                                        function storeQuantity() {
                                            var quantityInput = document.getElementById('quantity');
                                            var quantityHidden = document.getElementById('quantityInput');
                                            var qty = quantityInput.value;
                                            quantityHidden.value = qty;
                                        }
                                    </script>
                            <?php endif; ?>
                        </tr>
                    </table>
                </div>
            </div>
        </form>
    
            <div class="display-table shareRow">
                <div class="display-table-cell medium-up--one-third">
                    <div class="wishlist-btn">
                        <a class="wishlist add-to-wishlist" href="addwish.php?book_id=<?php echo $row_books['book_id']; ?>" title="Add to Wishlist" name="add_to_wish"><i class="icon anm anm-heart-l" aria-hidden="true" name="add_to_wish"></i> <span>Add to Wishlist</span></a>
                    </div>
                </div>

                <div class="display-table-cell text-right">
                    <div class="social-sharing">
                        <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-facebook" title="Share on Facebook">
                            <i class="fa fa-facebook-square" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Share</span>
                        </a>

                        <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-twitter" title="Tweet on Twitter">
                            <i class="fa fa-twitter" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Tweet</span>
                        </a>

                        <a href="#" title="Share on google+" class="btn btn--small btn--secondary btn--share" >
                            <i class="fa fa-google-plus" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Google+</span>
                        </a>

                        <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-pinterest" title="Pin on Pinterest">
                            <i class="fa fa-pinterest" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Pin it</span>
                        </a>

                        <a href="#" class="btn btn--small btn--secondary btn--share share-pinterest" title="Share by Email" target="_blank">
                            <i class="fa fa-envelope" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Email</span>
                        </a>
                    </div>
                </div>
            </div> 
        </div>
    </div>
 </div>
</div>
</div>
</div>


<div class="tabs-listing">
    <div class="tab-container">
        <div id="tab2" class="tab-content">
            <div id="shopify-product-reviews">
                <div class="spr-container">
                    <div class="spr-header clearfix">
                        <header class="section-header">
                            <h2 class="section-header__title text-center h2"><span>Customer Review</span></h2>
                        </header>
                        <div class="spr-summary">
                            <span class="product-review">
                                <span class="reviewLink">
                                    <?php
                                    // Retrieve the total number of reviews for the book_id from the database
                                    $book_id = $_GET['book_id'];
                                    $sql = "SELECT COUNT(*) AS total_reviews FROM review WHERE book_id = $book_id";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    $totalReviews = $row['total_reviews'];

                                    // Generate star ratings based on the total number of reviews
                                    $overloadRating = $totalReviews;
                                    for ($i = 1; $i <= 5; $i++) {
                                        if ($i <= $overloadRating) {
                                            echo '<i class="font-13 fa fa-star"></i>';
                                        } else {
                                            echo '<i class="font-13 fa fa-star-o"></i>';
                                        }
                                    }
                                    ?>
                                </span>
                                <span class="spr-summary-actions-togglereviews">Based on <?php echo $totalReviews; ?> reviews</span>
                            </span>
                            <span class="spr-summary-actions">
                                <a href="review.php?book_id=<?php echo $row_books['book_id']; ?>" class="spr-summary-actions-newreview btn">Write a review</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="shopify-product-reviews">
    <div class="spr-container">
        <div class="spr-content">
            <?php
            include("connection.php");

            if (isset($_GET['book_id'])) {
                $book_id = $_GET['book_id'];

                // Retrieve reviews from the database
                $sql = "SELECT * FROM review WHERE book_id = $book_id ORDER BY date DESC LIMIT 3";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        // Loop through each review
                        while ($row = mysqli_fetch_assoc($result)) {
                            $rating = $row['review_rating'];
                            $title = $row['review_title'];
                            $body = $row['review_body'];
                            $username = $row['review_name'];

                            // Generate HTML markup for each review
                            ?>
                            <div class="spr-review">
                                <div class="spr-review-header">
                                    <span class="product-review spr-starratings spr-review-header-starratings">
                                        <span class="reviewLink">
                                            <?php
                                            // Generate star ratings based on the rating value
                                            for ($i = 1; $i <= 5; $i++) {
                                                if ($i <= $rating) {
                                                    echo '<i class="fa fa-star"></i>';
                                                } else {
                                                    echo '<i class="font-13 fa fa-star-o"></i>';
                                                }
                                            }
                                            ?>
                                        </span>
                                    </span>
                                    <h3 class="spr-review-header-title"><?php echo $title; ?></h3>
                                    <span class="spr-review-header-byline">
                                        <strong><?php echo $username; ?></strong> on <strong><?php echo date("Y/m/d"); ?></strong>
                                    </span>
                                </div>
                                <div class="spr-review-content">
                                    <p class="spr-review-content-body"><?php echo $body; ?></p>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "No reviews yet.";
                    }
                } else {
                    echo "Error: " . mysqli_error($conn);
                }

            } else {
                echo "No book ID specified.";
            }
            ?>
        </div> <!-- /.spr-content -->
    </div> <!-- /.spr-container -->
</div> <!-- /#shopify-product-reviews -->

<?php if (mysqli_num_rows($result) > 0) { ?>
    <div class="infinitpaginOuter" style="text-align: center;">
        <a href="comment.php?book_id=<?php echo $book_id; ?>" class="btn" id="showMoreBtn">Show More</a>
    </div>
<?php } ?>

<br><br>


<!-- Related Product Slider -->
<div class="related-product grid-products">
    <header class="section-header">
        <h2 class="section-header__title text-center h2"><span>Related Products</span></h2>
    </header>
    <div class="productPageSlider">
        <?php
        
        // Retrieve the current product's category
        $current_product_id = $_GET['book_id'];
        $sql = "SELECT cat_id FROM books WHERE book_id = $current_product_id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $current_cat_id = $row['cat_id'];
        
        // Retrieve related products with the same category
        $sql = "SELECT * FROM books WHERE cat_id = '$current_cat_id' AND book_id != $current_product_id ORDER BY RAND() LIMIT 5";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $book_id = $row['book_id'];
            $book_title = $row['book_title'];
            $book_image = $row['book_image'];
            $book_price = $row['book_price'];
            ?>

            <div class="col-12 item">
                <div class="product-image">
                    <a href="product-detail.php?book_id=<?= $book_id; ?>" class="woo-thumbnail-wrap <?php if ($row['stock'] <= 0) echo 'outofstock2'; ?>">
                        <?php
                        if ($row['stock'] <= 0) {
                            echo '<div class="out-of-stock-overlay"></div>';
                        }
                        ?>
                        <img src="assets/images/<?= $book_image ?>" alt="image" title="product" width="300" height="300">
                    </a>

                    <div class="button-set">
                        <div class="wishlist-btn">
                            <a class="wishlist add-to-wishlist" href="addwish.php?book_id=<?php echo $row['book_id']; ?>" title="Add to Wishlist" name="add_to_wish">
                                <i class="icon anm anm-heart-l"></i>
                            </a>
                        </div>
                    </div>

                    <?php if ($row['stock'] > 0) { ?>
                        <form class="variants add" action="addtocart.php?book_id=<?= $book_id;?>" onclick="window.location.href='cart.php'" method="post">
                            <button type="submit" name="cart" value="<?= $book_id; ?>" class="btn btn-sm btn-primary">Add to cart</button>
                        </form>
                    <?php } ?>
                </div>

                <div class="product-details text-center">
                    <div class="product-name">
                        <a href="product-detail.php?book_id=<?= $book_id; ?>"><?= $book_title; ?></a>
                    </div>
                    <div class="product-price">
                        <span class="price">RM <?= $book_price ?></span>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>
    <!--Scoll Top-->
    <span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
    <!--End Scoll Top-->
    
     <script src="assets/js/main.js"></script>
     <!-- Photoswipe Gallery -->
     <script src="assets/js/vendor/photoswipe.min.js"></script>
     <script src="assets/js/vendor/photoswipe-ui-default.min.js"></script>
     <script>
        $(function(){
            var $pswp = $('.pswp')[0],
                image = [],
                getItems = function() {
                    var items = [];
                    $('.lightboximages a').each(function() {
                        var $href   = $(this).attr('href'),
                            $size   = $(this).data('size').split('x'),
                            item = {
                                src : $href,
                                w: $size[0],
                                h: $size[1]
                            }
                            items.push(item);
                    });
                    return items;
                }
            var items = getItems();
        
            $.each(items, function(index, value) {
                image[index]     = new Image();
                image[index].src = value['src'];
            });
            $('.prlightbox').on('click', function (event) {
                event.preventDefault();
              
                var $index = $(".active-thumb").parent().attr('data-slick-index');
                $index++;
                $index = $index-1;
        
                var options = {
                    index: $index,
                    bgOpacity: 0.9,
                    showHideOpacity: true
                }
                var lightBox = new PhotoSwipe($pswp, PhotoSwipeUI_Default, items, options);
                lightBox.init();
            });
        });
        </script>
    </div>

	<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        	<div class="pswp__bg"></div>
            <div class="pswp__scroll-wrap"><div class="pswp__container"><div class="pswp__item"></div><div class="pswp__item"></div><div class="pswp__item"></div></div><div class="pswp__ui pswp__ui--hidden"><div class="pswp__top-bar"><div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button><button class="pswp__button pswp__button--share" title="Share"></button><button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button><button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button><div class="pswp__preloader"><div class="pswp__preloader__icn"><div class="pswp__preloader__cut"><div class="pswp__preloader__donut"></div></div></div></div></div><div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap"><div class="pswp__share-tooltip"></div></div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button><button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button><div class="pswp__caption"><div class="pswp__caption__center"></div></div></div></div></div>

</body>

</html>

<?php 
include('footer.php')
?>

