<?php
session_start();
include 'connect.php';

if(!isset($_SESSION['user_id']))
{
        header("Location: login.php");
        exit(0);
    }
    elseif($_SESSION['verify'] == 0){
        header("Location: signup_sendemailverify.php");
        exit(0);
    }
    else{
    if(isset($_GET['book_id']))
        {
            if(isset($_GET['quantity'])){
                $quantity = $_GET['quantity'];
            }else{
                $quantity = 1;
            }

            $uid = $_SESSION['user_id'];
            $bid = $_GET['book_id'];

            $stock = mysqli_query($conn, "select * from books where book_id = '$bid'");
            $row = mysqli_fetch_assoc($stock);

            if($row['stock']>0)
            {
                $cartc = "select * from cart where bid = '$bid' and uid = '$uid'";
                $cartcheck =  mysqli_query($conn,$cartc);
    
                if(mysqli_num_rows($cartcheck)==1){
                    mysqli_query($conn, "update cart set qty = qty+1 where bid='$bid' and uid = '$uid'");
                    header("Location: cart.php");
                }
                else{
                    mysqli_query($conn, "insert into cart (uid, bid, qty) values ('$uid', '$bid', '$quantity')");
                    header("Location: cart.php");
                }
            }
            else
            {
                $_SESSION['cartmsg'] = "The product is out of stock. Cannot add to cart.";
                ?>
                    <script type = "text/javascript">
                    alert("The product is out of stock. Cannot add to cart.");
                    </script>
                <?php
                header("refresh:0.05; url=product-detail.php?book_id=$bid");
                exit;
            }
           

            

        }
        
        
}
?>