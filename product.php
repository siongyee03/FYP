
<?php
include("header.php");
include("connection.php");
?>

<style>
.outofstock:before {
	content: "";
	background: rgba(255,255,255,0.5);
	width: 100%;
	height: 100%;
	position: absolute;
	left: 0; top: 0;
}

.outofstock:after {
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
<!--Body Content-->
<div id="page-content">
<!--Collection Banner-->
<div class="collection-header">
    <div class="collection-hero">
        <div class="collection-hero__image"><img src="assets/images/book 3.jpg" alt="">
            <div class="collection-hero__title-wrapper"><h1 class="collection-hero__title page-width">Brich Bookstore</h1></div>
        </div>
    </div>
</div>
</div>
<br>
<!--End Collection Banner-->  

<div class="container">
<div class="row">
    <!--Sidebar-->
    <div class="col-12 col-sm-12 col-md-3 col-lg-3 sidebar filterbar">
        <div class="closeFilter d-block d-md-none d-lg-none"><i class="icon icon anm anm-times-l"></i></div>
        <div class="sidebar_tags">

            <!--Categories-->
            <div class="sidebar_widget categories filter-widget">
                <div class="widget-title"><h2>Categories List</h2></div>
                <div class="widget-content">
                    <ul class="sidebar_categories">
                        <li><a href="product.php" >All product</a></li>
                        <?php
                            // Fetch categories from the database
                            $sql = "SELECT * FROM category";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<li class="lvl-1"><a href="?category='.$row['cat_id'].'">'.$row['cat_title'].'</a></li>';
                            }
                        ?>
                    </ul>
                </div>
            </div>
            <!--Categories-->

            <!--Price Filter-->
            <div class="sidebar_widget filterBox filter-widget">
                <div class="widget-title">
                    <h2>Price Range</h2>
                </div>
                <form action=" " method="GET" class="price-filter">
                    <div>
                        <div class="form-group">
                            <label for="min_price">Minimum price:</label>
                            <input type="number" name="min_price" id="max_price" class="form-control" value="<?php echo isset($_GET['min_price']) ? $_GET['min_price'] : 1; ?>" min="1" max="150">
                        </div>
                        <div class="form-group">
                            <label for="max_price">Maximum price:</label>
                            <input type="number" name="max_price" id="max_price" class="form-control" value="<?php echo isset($_GET['max_price']) ? $_GET['max_price'] : 150; ?>" min="1" max="150">
                            <button type="submit" class="btn btn-primary btn mt-3 float-right">Filter</button>
                        </div>
                    </div>  
                </form>
            </div>
            <!--End Price Filter-->

            <!--Search-->
            <div class="sidebar_widget filterBox filter-widget">
                <div class="widget-title"><h2>Search Name</h2></div>
                <form method="GET" action="">
                    <div class="form-group">
                        <input type="text" name="search" class="form-control" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                        <button type="submit" class="btn btn-primary btn mt-3 float-right">Search</button>
                    </div>
                </form>  
            </div>
            <!--End Search-->
        </div>
    </div>
    <!--End Sidebar-->

    <!--Main Content-->
    <div class="col-12 col-sm-12 col-md-9 col-lg-9 main-col">
        <div class="category-description">
            <div class="productList"><br>
                <div class="grid-products grid--view-items">
                    <div class="row">
                        <?php
                            // Fetch products from the database based on category and price range filters
                            $category_filter = isset($_GET['category']) ? "AND cat_id='" . $_GET['category'] . "'" : "";
                            $price_filter = "";
                            if (isset($_GET['min_price']) && isset($_GET['max_price'])) {
                                $price_filter = "AND book_price BETWEEN " . $_GET['min_price'] . " AND " . $_GET['max_price'];
                                if ($_GET['min_price'] > $_GET['max_price']) {
                                    // Display an error message or take appropriate action
                                    echo '<script>alert("Minimum price cannot be greater than the maximum price.")</script>';
                                }
                            } elseif (isset($_GET['min_price'])) {
                                $price_filter = "AND book_price >= " . $_GET['min_price'];
                            } elseif (isset($_GET['max_price'])) {
                                $price_filter = "AND book_price <= " . $_GET['max_price'];
                            }
                            $search_query = isset($_GET['search']) ? $_GET['search'] : '';
                            $sql = "SELECT * FROM books WHERE 1=1 AND book_title LIKE '%$search_query%' " . $category_filter . $price_filter;

                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="col-4 col-sm-6 col-md-4 col-lg-3 item">
    <!-- start product image -->
    <div class="product-image">
        <a href="product-detail.php?book_id=<?= $row['book_id']; ?>" class="woo-thumbnail-wrap <?php if ($row['stock'] <= 0) echo 'outofstock'; ?>">
            <?php
                if ($row['stock'] <= 0) {
                    echo '<div class="out-of-stock-overlay"></div>';
                }
            ?>
            <img class="" src="assets/images/<?= $row['book_image']; ?>" alt="product" title="product" height=300px>
        </a>
        <!-- end product image -->

        <!-- Start product button -->
        <?php if ($row['stock'] > 0) { ?>
          <form class="variants add" action="addtocart.php" method="get">
            <input type="hidden" name="book_id" value="<?= $row['book_id']; ?>">
            <button type="submit" name="cart" value="<?= $row['book_id'];?>" class="btn btn-sm btn-primary">Add to cart</button>
        </form>
        <?php } ?>

        <div class="button-set">
            <div class="wishlist-btn">
                <a class="wishlist add-to-wishlist" href="addwish.php?book_id=<?php echo $row['book_id']; ?>" title="Add to Wishlist" name="add_to_wish">
                    <i class="icon anm anm-heart-l"></i>
                </a>
            </div>
        </div>
        <!-- end product button -->
    </div>
    <!-- end product image -->

    <!--start product details -->
    <div class="product-details text-center">
        <!-- product name -->
        <div class="product-name">
            <a href="product-detail.php?book_id=<?= $row['book_id']; ?>"><?= $row['book_title']; ?></a>
        </div>
        <!-- End product name -->
        <!-- product price -->
        <div class="product-price">
            <span class="price">RM<?= $row['book_price']; ?></span>
        </div>
        <!-- End product price -->
    </div>
    <!-- End product details -->
</div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Main Content-->
</div>
</div>

             
                 
            </div>
        </div>
      </div>
    </div>
  </div>    
</div>
<!--End Body Content-->


                      
<?php
include ("footer.php")
?>
 <!--Scoll Top-->
 <span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
    <!--End Scoll Top-->

<script src="assets/js/main.js"></script>


                 