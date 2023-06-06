<?php
include 'connect.php';
session_start();

// Check if form has been submitted
if(isset($_POST['order'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $telephone = $_POST['telephone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postcode = $_POST['postcode'];
    $payment_method = $_POST['payment_method'];
    $uid = $_SESSION['user_id'];
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

    // Insert the order items into the database
    $sql = "SELECT * FROM cart WHERE uid = '$uid'";
    $result = mysqli_query($conn, $sql);

    // Initialize the variable to hold the order ID
    $order_id = "";

    while ($row = mysqli_fetch_assoc($result)) {
        $book_id = $row['bid'];
        $qty = $row['qty'];

        // Retrieve the book price from the database
        $sql_price = "SELECT book_price FROM books WHERE book_id = '$book_id'";
        $result_price = mysqli_query($conn, $sql_price);
        $row_price = mysqli_fetch_assoc($result_price);
        $book_price = $row_price['book_price'];

        $total = $qty * $book_price;

        // Insert order into database
        $sql_order = "INSERT INTO orders (uid, bid, qty, paid, shipping_detail_id, payment_method, order_status, order_note) 
                      VALUES ('$uid', '$book_id', '$qty', '$total', '$shipping_detail_id', '$payment_method', 'In Progress', '$note')";
        if ($conn->query($sql_order) !== TRUE) {
            echo "Error: " . $sql_order . "<br>" . $conn->error;
            exit();
        }

        // Get the order ID of the inserted order
        $order_id = mysqli_insert_id($conn);

        // Update book stock quantity
        $sql_update_stock = "UPDATE books SET stock = stock - '$qty' WHERE book_id = '$book_id'";
        if ($conn->query($sql_update_stock) !== TRUE) {
            echo "Error: " . $sql_update_stock . "<br>" . $conn->error;
            exit();
        }
    }

    // Clear cart
    $sql_clear_cart = "DELETE FROM cart WHERE uid = '$uid'";
    if ($conn->query($sql_clear_cart) !== TRUE) {
        echo "Error: " . $sql_clear_cart . "<br>" . $conn->error;
        exit();
    }

    // Store the order ID in the shipping detail
    $sql_update_order_id = "UPDATE shipping_detail SET oid = '$order_id' WHERE id = '$shipping_detail_id'";
    if ($conn->query($sql_update_order_id) !== TRUE) {
        echo "Error: " . $sql_update_order_id . "<br>" . $conn->error;
        exit();
    }

    // Close database connection
    $conn->close();
    echo '<script>alert("Order has been purchased successfully! Thank you!")</script>';
    echo "<script>window.location.href='order-history.php'</script>";
}
?>
