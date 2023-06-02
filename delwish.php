<?php
ob_start();
session_start();
include 'connect.php';
    if(!isset($_SESSION['user_id']))
    {
        header("Location: login.php");
    }else{
            
        $uid = $_GET['uid'];
        $pid = $_GET['book_id'];
        
        $del = "delete from wishlist where pid = '$pid' and uid = '$uid'" ;
        if(mysqli_query($conn,$del));
            header("Location: wishlist.php");
    }
   
    
?>
