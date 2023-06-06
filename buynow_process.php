<?php

session_start();
include "connect.php";

// Check if form has been submitted
if (isset($_POST['order'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $telephone = $_POST['telephone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postcode = $_POST['postcode'];
    $payment_method = $_POST['payment_method'];
    $uid = $_SESSION['user_id'];
    $book_id = $_POST['book_id'];
    $qty = $_POST['quantity'];
    $note = $_POST['note'];

    // Insert shipping detail into database
    $sql = "INSERT INTO shipping_detail (name, telephone, address, city, state, postcode, country) 
            VALUES ('$name', '$telephone', '$address', '$city', '$state', '$postcode', 'Malaysia')";
    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
        exit();
    }

    // Retrieve the newly inserted shipping detail ID
    $shipping_detail_id = mysqli_insert_id($conn);
    $_SESSION['shipping_detail_id'] = $shipping_detail_id;

    // Retrieve book price
    $sql = "SELECT book_price FROM books WHERE book_id = '$book_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $book_price = $row['book_price'];

    // Calculate total amount
    $total = $qty * $book_price;

    // Insert order into database
    $sql = "INSERT INTO orders (uid, bid, qty, paid, shipping_detail_id, payment_method, order_status, order_note) 
            VALUES ('$uid', '$book_id', '$qty', '$total', '$shipping_detail_id', '$payment_method', 'In Progress', '$note')";
    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
        exit();
    }

    // Retrieve the newly inserted order ID
    $order_id = mysqli_insert_id($conn);

    // Update shipping detail record with the order ID
    $sql = "UPDATE shipping_detail SET oid='$order_id' WHERE id='$shipping_detail_id'";
    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
        exit();
    }

    // Update book stock quantity
    $sql = "UPDATE books SET stock = stock - '$qty' WHERE book_id = '$book_id'";
    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
        exit();
    }

    // Close database connection
    $conn->close();
    echo '<script>alert("Order has been purchased successfully! Thank you!")</script>';
    echo "<script>window.location.href='order-history.php'</script>";
}
?>
