<?php

session_start();
include "connect.php";

    $uid = $_GET['uid'];
    $bid = $_GET['bid'];

    $del = "delete from cart where uid = '$uid' and bid = '$bid'" ;
    if(mysqli_query($conn,$del)){
        header("Location: cart.php");
    }
           

?>