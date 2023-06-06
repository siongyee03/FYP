<?php
ob_start();
session_start();
include 'connect.php';
    if(!isset($_SESSION['user_id']) || $_SESSION['verify'] == 0)
    {
        header("Location: wishlist.php");
    }else{
            
        $uid = $_SESSION['user_id'];
        $pid = $_GET['book_id'];
        
        $check = "select * from wishlist where pid = '$pid' and uid = '$uid'";
        $resultcheck = mysqli_query($conn,$check);
    
        if(mysqli_num_rows($resultcheck)==1){
    
            echo "product existed in wishlist";
            header("Location: wishlist.php");
            
        }else{
    
            echo "Added";
            mysqli_query($conn, "insert into wishlist (uid, pid) values ('$uid', '$pid')");
            header("Location: wishlist.php");
        }
    }
   
?>
