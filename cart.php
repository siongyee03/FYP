<?php 
include"header.php";
include "connect.php";

?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- belle/cart.html   11 Nov 2019 12:47:01 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Cart &ndash; BRich Bookstore</title>
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
        ques = confirm("Delete this book from your shopping cart?");
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
        		<div class="wrapper"><h1 class="page-width" style="padding-top: 60px">My cart</h1></div>
      		</div>
		</div>
        <!--End Page Title-->
        
        <div class="container">
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
            }
            else{
            ?>
        	<div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 main-col">
                    <?php

                        $total = 0;
                        $uid = $_SESSION['user_id'];
                        $sql = "select * from cart join books on books.book_id = cart.bid where uid = '$uid' ";
                        $result = mysqli_query($conn, $sql);
                        $rowcount = mysqli_num_rows($result);
                        if($rowcount!=0){
                
                    ?>
                	<form action="updatecart.php?uid=<?php echo $_SESSION['user_id'];?>" method="POST" class="cart style2" id="cartupfrm" name="cartupfrm" autocomplete="off">
                		<table>
                            <thead class="cart__row cart__header">
                                <tr>
                                    <th colspan="2" class="text-center">Product</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-right">Total</th>
                                    <th class="action">&nbsp;</th>
                                </tr>
                            </thead>
                              
                                <?php
                                while($row = mysqli_fetch_array($result)){
                                    $book_id = $row['book_id'];
                                    ?>
                                    <tbody>
                                        
                                        <tr class="cart__row border-bottom line1 cart-flex border-top">
                                            <td class="cart__image-wrapper cart-flex-item">
                                                <a href="product-detail.php?book_id=<?php echo $row['book_id'];?>"><img class="cart__image" src="assets/images/<?php echo $row['book_image']; ?>" alt="<?php echo $row['book_title']; ?>"></a>
                                            </td>
                                            <td class="cart__meta small--text-left cart-flex-item">
                                                <div class="list-view-item__title">
                                                    <a href="product-detail.php?book_id=<?php echo $row['book_id'];?>"><?php echo $row['book_title'];?> </a>
                                                </div>
                                                
                                                <div class="cart__meta-text">
                                                Publisher: <?php echo $row['book_publisher'];?>
                                                </div>
                                            </td>
                                            <td class="cart__price-wrapper cart-flex-item">
                                                <span class="money">RM<?php echo $row['book_price']?></span>
                                            </td>
                        
                                            <td class="cart__update-wrapper cart-flex-item text-right" style="width:150px;">
                                            <input type="hidden" name="book_id[]" id="book_id" value="<?php echo $book_id;?>">
                                                <div class="cart__qty text-center">
                                                    <div class="qtyField">
                                                        <a class="qtyBtn minus" href="javascript:void(0);" style=""><i class="icon icon-minus"></i></a>
                                                        <input class="cart__qty-input qty" type="text" name="updatesqty[]" id="qty" value="<?= $row['qty']?>" pattern="[1-9]">
                                                        
                                                        <a class="qtyBtn plus" href="javascript:void(0);" style=""><i class="icon icon-plus"></i></a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-right small--hide cart-price">
                                                <div><span class="money">RM<?php echo $row['book_price'] * $row['qty'] ?></span></div>
                                            </td>
                                            <td class="text-center small--hide"><a href="delcart.php?uid=<?php echo $_SESSION['user_id']?>&bid=<?php echo $row['book_id'];?>" class="btn btn--secondary cart__remove" title="Remove item" onclick="return confirmation();"><i class="icon icon anm anm-times-l"></i></a></td>
                                        </tr>
                                    </tbody>
                                    <?php
                                    $total  +=  ($row['book_price'] * $row['qty']);
                                }
                                ?>
                    		        <tfoot>
                                        <tr>
                                            <td colspan="3" class="text-left"><a href="product.php" class="btn--link cart-continue"><i class="icon icon-arrow-circle-left"></i> Continue shopping</a></td>
                                            <td colspan="3" class="text-right">
                                            <button type="submit" name="update" class="btn--link cart-update" value=""><i class="fa fa-refresh"></i> Update</button>
                                            </td>
                                        </tr>
                                    </tfoot>
                               
                        </table>
                    </form>
                   
                   
                    <div class="currencymsg">We processes all orders in MYR. While the content of your cart is currently displayed in USD, the checkout will use USD at the most current exchange rate.</div>
                    <hr>
                    <!--</form> -->                  
               	</div>
               
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 cart__footer">
                    <!--form-->
                    <form method="POST" action="cartToCheckOut.php">
                        <div class="cart-note">
                            <div class="solid-border">
                                <h5><label for="CartSpecialInstructions" class="cart-note__label small--text-center">Add a note to your order</label></h5>
                                <textarea name="note" id="CartSpecialInstructions" class="cart-note__input" maxlength="3500"></textarea>
                            </div>
                        </div>
                        <div class="solid-border">
                        <div class="row">
                            <span class="col-12 col-sm-6 cart__subtotal-title"><strong>Subtotal</strong></span>
                            <span class="col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right"><span class="money">RM <?php if(isset($total) && $total >= 0 ){echo $total;}?></span></span>
                        </div>
                        <div class="cart__shipping">Shipping &amp; taxes calculated at checkout</div>
                        <p class="cart_tearm">
                            <label>
                            <input type="checkbox" name="tearm" id="cartTearm" class="checkbox" value="tearm" required="">
                            I agree with the terms and conditions</label>
                        </p>
                        <input type="submit" name="checkout" id="cartCheckout" class="btn btn--small-wide checkout" value="Checkout">
                        <div class="paymnet-img"><img src="assets/images/payment-img.jpg" alt="Payment"></div>
                        </div>
                        </form>
                        <!--/form-->
                    </div>
                <?php
                }
                else
                {
                ?>
                <div style=" display: flex; justify-content: center; align-items: center; margin: auto; width: 350px; height: 200px;  ">
                    <div class="text-center" style="font-size: 15px; word-spacing: 2px; line-height: 1.5;" >
                        <p >Your cart is empty</p>
                        <a href = "product.php"><button type="button" class="btn btn-small">Add Product</button></a>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
    <!--End Body Content-->
    
    
<?php
include("footer.php")
?>


    <!--Scoll Top-->
    <span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
    <!--End Scoll Top-->
    
    <script src="assets/js/main.js"></script>
<!--
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>
    <script src="assets/js/cart.js" defer></script>-->
</div>
</body>
</html>