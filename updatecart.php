<?php
session_start();
include "connect.php";

/*echo '<pre>';
print_r($_POST);
echo '</pre>';
exit;*/
if(isset($_POST['update'])){
    $uid = $_GET['uid'];
    $bid = $_POST['book_id'];
    $upqty = $_POST['updatesqty'];
    foreach($upqty as $index => $value)
    {
        $update = mysqli_query($conn, "update cart set qty = '$value' where uid = '$uid' and bid= '$bid[$index]'");
        
    }
    if($update)
        {
        header("Location: cart.php");
        exit(0);   
        }
    else{
        ?>
        <script type = "text/javascript">
        alert("update failed");
        </script>
        <?php
        header("Location: cart.php");
        exit(0);   
        }
    }
?>