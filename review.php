<?php
include("header.php");
include ("connect.php");
?>
<title>Review &ndash; BRich Bookstore</title>
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

<!--Body Content-->
<div id="page-content">
  
<?php
  if (!isset($_SESSION['user_id']) & empty($_SESSION['user_id'])) {
    ?>
    <div style="display: flex; justify-content: center; align-items: center; margin: auto; width: 350px; height: 200px;">
      <div class="text-center" style="font-size: 15px; word-spacing: 2px; line-height: 1.5;">
        <p>Login to reviews items</p>
        <a href="login.php"><button type="button" class="btn btn-small">LOGIN</button></a>
      </div>
    </div>
    <?php
  } else {
    ?>
    
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
                echo '<a href="product-detail.php?book_id=' . $book_id . '" title="Back to the product detail page">' . $book_title . '</a><span aria-hidden="true">›</span>';
                echo "Write Review";
            }
            ?>
        </div>
    </div>
    <!-- End Breadcrumb -->                               


    <!--Product Tabs-->                                  
    <div class="spr-container">
        <div class="spr-content">
            <form method="post" action="add_comment.php?book_id=<?= $_GET['book_id'];?>" id="new-review-form" class="new-review-form">
                <h3 class="spr-form-title">Write a review</h3>
           
                <div class="spr-form-review-rating">
                    <label class="spr-form-label">Rating</label>
                      <div class="spr-form-input spr-starrating">
                        <div class="center">
                          <div class="rating">
                            <input type="radio" id="star5" name="review_rating" value="5">
                            <label for="star5"></label>
                            <input type="radio" id="star4" name="review_rating" value="4">
                            <label for="star4"></label>
                            <input type="radio" id="star3" name="review_rating" value="3">
                            <label for="star3"></label>
                            <input type="radio" id="star2" name="review_rating" value="2">
                            <label for="star2"></label>
                            <input type="radio" id="star1" name="review_rating" value="1">
                            <label for="star1"></label>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
                
                    <div class="spr-form-review-title">
                        <label class="spr-form-label" for="review_title">Review Title</label>
                        <input class="spr-form-input spr-form-input-text" id="review_title" type="text" name="review_title" value="" placeholder="Give your review a title">
                    </div>
                
                    <div class="spr-form-review-body">
                        <label class="spr-form-label" for="review_body">Body of Review <span class="spr-form-review-body-charactersremaining">(1500)</span></label>
                        <div class="spr-form-input">
                            <textarea class="spr-form-input spr-form-input-textarea" id="review_body" data-product-id="10508262282" name="review_body" rows="10" placeholder="Write your comments here"></textarea>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="spr-form-actions">
                    <input type="submit" name="review" class="spr-button spr-button-primary button button-primary btn btn-primary" value="Submit Review">
                </fieldset>
            </form>
            <?php
  }?>
        </div>
    </div>
</div>

<?php
include('footer.php');
?>

<script src="assets/js/main.js"></script>


                            
                            
