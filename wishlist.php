<?php 
include"header.php";
include "connect.php";
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Wishlist &ndash; BRICH Bookstore</title>
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

<script type="text/javascript">

    function confirmation()
    {
        ques = confirm("Delete this book from your wishlist?");
        return ques;
    }

</script>

</head>
<body class="page-template belle">
<div class="pageWrapper">   
    <!--Body Content-->
    <div id="page-content">
    	<!--Page Title-->
    	<div class="page section-header text-center">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width" style="padding-top: 60px">Wish List</h1></div>
      		</div>
		</div>
        <!--End Page Title-->
        
        <div class="container">
        	<div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                    <?php
                    if(!isset($_SESSION['user_id']) & empty($_SESSION['user_id']))
                        {
                    ?>
                        <div style=" display: flex; justify-content: center; align-items: center; margin: auto; width: 350px; height: 200px;  ">
                            <div class="text-center" style="font-size: 15px; word-spacing: 2px; line-height: 1.5;" >
                            <p >Login to add items</p>
                            <a href = "login.php"><button type="button" class="btn btn-small">LOGIN</button></a>
                            </div>
                        </div>
                    <?php
                        }else{
                            ?>
                	<form action="#">
                            <?php
                            $uid = $_SESSION['user_id'];

                            mysqli_select_db($conn, "bookstore");
                            $result = mysqli_query($conn, "select * from wishlist join books on books.book_id = wishlist.pid and uid = '$uid'");
                            $rowcount = mysqli_num_rows($result);

                            if($rowcount != 0)
                            {

                            ?>

                        <div class="wishlist-table table-content table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    	<th class="product-name text-center alt-font">Remove</th>
                                        <th class="product-price text-center alt-font">Images</th>
                                        <th class="product-name alt-font">Product</th>
                                        <th class="product-price text-center alt-font">Unit Price</th>
                                        <th class="stock-status text-center alt-font">Stock Status</th>
                                        <th class="product-subtotal text-center alt-font">Add to Cart</th>
                                    </tr>
                                </thead>
                                <?php
                                while($row = mysqli_fetch_assoc($result))
                                {
                                    ?>

                                <tbody>
                                    <tr>
                                    	<td class="product-remove text-center" valign="middle"><a href="delwish.php?book_id= <?php echo $row['book_id']?>&uid=<?php echo $_SESSION['user_id']; ?>" onclick="return confirmation();"><i class="icon icon anm anm-times-l"></i></a></td>
                                        <td class="product-thumbnail text-center">
                                            <a href="product-detail.php?book_id=<?php echo $row['book_id'];?>"><img src="assets/images/<?php echo $row['book_image'];?>" alt="<?php echo $row['book_title']?>" title="" /></a>
                                        </td>
                                        <td class="product-name"><h4 class="no-margin"><a href="product-detail.php?book_id=<?php echo $row['book_id'];?>"><?php echo $row['book_title'];?></a></h4></td>
                                        <td class="product-price text-center"><span class="amount">RM <?php echo $row['book_price'];?></span></td>
                                        <td class="stock text-center">
                                            <span class="in-stock">
                                                <?php 
                                                if($row['stock'] !=0){
                                                    echo "In stock";
                                                }
                                                else{
                                                    echo "Out of stock";
                                                }?>
                                                <!--change to stock status-->
                                            </span>
                                        </td>
                                        <td class="product-subtotal text-center">
                                            <?php if($row['stock']==0): ?>
                                            <button type="button" class="btn btn-small" disabled="">Out Of Stock</button>
                                            <?php else: ?>
                                            <a href="addtocart.php?book_id= <?php echo $row['book_id']?>; ?>">
                                            <button type="button" class="btn btn-small">Add To Cart</button></a>
                                        </td>
                                            <?php endif; ?>
                                    </tr>
                                </tbody>

                                <?php
                                }
                               ?>
                            </table>
                            <?php
                        }

                        else{
                        
                        ?>
                                <div style=" display: flex; justify-content: center; align-items: center; margin: auto; width: 350px; height: 200px;  ">
                                    <div class="text-center" style="font-size: 15px; word-spacing: 2px; line-height: 1.5;" >
                                        <p >Your wishlist is empty</p>
                                        <p>Add your wishlist here</p>
                                        <a href = "product.php"><button type="button" class="btn btn-small">Add Product</button></a>
                                    </div>
                                </div>
                            <?php
                        }
                        ?>
                        </div>
                    </form>      
                    <?php
                        }
                    ?>             
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
    
</div>
</body>

</html>