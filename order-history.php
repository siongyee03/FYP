<?php
include('header.php');
include "connect.php";
?>

<title>Order History &ndash; BRich Bookstore</title>
    <!--Body Content-->
    <div id="page-content">
    	<!--Page Title-->
    	<div class="page section-header text-center">
			<div class="page-title">
            <h1 class="page-width" style="padding-top: 60px">Order History</h1></div>
      		</div>
		</div>

        <!--End Page Title--> 
        <div class="container">
        	<div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                	<form action="#">
                        <div class="wishlist-table table-content table-responsive">

                        <?php
                        $total = 0;
                        $uid = $_SESSION['user_id'];
                        $sql = "SELECT *
                                FROM orders
                                JOIN books ON books.book_id = orders.bid
                                JOIN shipping_detail ON shipping_detail.id = orders.shipping_detail_id
                                WHERE uid = '$uid'
                                ORDER BY order_date DESC";

                        $result = mysqli_query($conn, $sql);
                        if (!$result) {
                            die("Error executing SQL query: " . mysqli_error($conn));
                        }
                        $rowcount = mysqli_num_rows($result);

                        if ($rowcount != 0) {
                        ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="product-name text-center alt-font">Images</th>
                                    <th class="product-name text-center alt-font">Product</th>
                                    <th class="product-price text-center alt-font">Unit Price</th>
                                    <th class="stock-status text-center alt-font">Quantity</th>
                                    <th class="stock-status text-center alt-font">Subtotal</th>
                                    <th class="stock-status text-center alt-font">Payment Method</th>
                                    <th class="product-subtotal text-center alt-font">Order Date</th>
                                    <th class="product-subtotal text-center alt-font">Order Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $book_id = $row['book_id'];
                                    $subtotal = $row['book_price'] * $row['qty'];
                                ?>

                                <tr>
                                    <td class="product-thumbnail text-center"><a href="product-detail.php?book_id=<?php echo $row['book_id'];?>"><img class="cart__image" src="assets/images/<?php echo $row['book_image']; ?>" alt="<?php echo $row['book_title']; ?>"  alt="apple" class="rounded-circle"></a></td>
                                    <td class="product-name text-center"><h4 class="no-margin"><a href="product-detail.php?book_id=<?php echo $row['book_id'];?>"><?php echo $row['book_title'];?></h4></a>
                                    <td class="product-unitprice text-center"><span class="unitprice">RM<?php echo $row['book_price']?></span></td>
                                    <td class="product-quantity text-center"><span class="in-stock"><?php echo $row['qty']?></span></td>
                                    <td class="product-subtotal text-center"><span class="subtotal">RM<?php echo $row['book_price'] * $row['qty'] ?></span></td>
                                    <td class="product-subtotal text-center"><span class="paymethod"><?php echo $row['payment_method']?></span></td>
                                    <td class="product-orderedate text-center"><span class="date"><?php echo date('l, F d, Y', strtotime($row['order_date'])); ?></span></td>
                                    <td class="product-status text-center"><span class="status"><?php if($row['order_status'] == 'Pending'){echo "In Progress";} else echo $row['order_status']?></span></td>
                                <?php  
                                }
                                ?>
                            </tbody>
                        </table>
                        <?php
                        } else {
                            echo "No orders yet.";
                        }
                        ?>                  
                    </form>                   
               	</div>
            </div>
        </div>
    </div>
    <!--End Body Content-->

<?php
include('footer.php')
?>

<script src="assets/js/main.js"></script>
           
        
                                
    
        

