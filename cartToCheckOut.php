<?php
session_start();
include "connect.php";

if(isset($_POST['checkout'])){
    
    $note = mysqli_real_escape_string($conn,$_POST['note']);
    $term = $_POST['tearm'];

    if(empty($term))
    {
    ?>
        <script type = "text/javascript">
        alert("Please tick the box");
        </script>
    <?php
    }
    else{
        if(!empty($note))
        {
            $sql = "update orders set order_note = '".$note."' where uid = '".$_SESSION['user_id']."' and";
            $result = mysqli_query($conn, $sql);
            $checkout = "insert into orders () values ()";

            if($result)
            {
                header("Location: checkout.php");
                exit(0);
            }
        }   
        else{
            header("Location: checkout.php");
            exit(0);
        }     
    }
    
}
?>