<?php
include("header.php");
include "connect.php";
?>

<title>Comment Page &ndash; BRich Bookstore</title>
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
  .rating {
  display: inline-block;
}

.rating input {
  display: none;
}

.rating label {
  float: right;
  cursor: pointer;
  color: #bbb;
  font-size: 30px;
  margin: 0 2px;
}

.rating label:before {
  content: '\2605';
}

.rating input:checked ~ label {
  color: #ffbf00;
}
</style>


<!-- Body Content -->
<div id="page-content">

    <!-- Breadcrumb -->
    <div class="bredcrumbWrap" style="padding-top: 50px;">
        <div class="container breadcrumbs">
            <a href="index.php" title="Back to the home page">Home</a><span aria-hidden="true">›</span>
            <a href="product.php" title="Back to the product page">Product</a><span aria-hidden="true">›</span>
            <?php
            include("connection.php");

            if (isset($_GET['book_id'])) {
                $book_id = $_GET['book_id'];

                // Retrieve the book title from the database
                $sql = "SELECT book_title FROM books WHERE book_id = $book_id";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $book_title = $row['book_title'];

                // Display the book title in the breadcrumb
                echo '<a href="product-detail.php?book_id=' . $book_id . '" title="Back to the product detail page">' . $book_title . '</a><span aria-hidden="true">›</span>';
                echo "Customer Review";

            }

            mysqli_close($conn);
            ?>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Rest of the content -->

</div>
<!-- End Body Content -->



    <?php
include("connection.php");

if (isset($_GET['book_id'])) {
    $book_id = $_GET['book_id'];

    // Retrieve reviews from the database
    $sql = "SELECT * FROM review WHERE book_id = $book_id";
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
            echo "No reviews found.";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "No book ID specified.";
}
?>
    <!-- Including Jquery -->
     <script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
     <script src="assets/js/vendor/jquery.cookie.js"></script>
     <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
     <script src="assets/js/vendor/wow.min.js"></script>
     <!-- Including Javascript -->
     <script src="assets/js/bootstrap.min.js"></script>
     <script src="assets/js/plugins.js"></script>
     <script src="assets/js/popper.min.js"></script>
     <script src="assets/js/lazysizes.js"></script>
     <script src="assets/js/main.js"></script>
    
    </div>




        