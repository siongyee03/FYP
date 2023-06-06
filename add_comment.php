<?php
session_start();
include "connect.php";
// Check if the form is submitted
if (isset($_POST['review'])) {
    // Retrieve form data
    $rating = $_POST['review_rating']; 
    $title = $_POST['review_title'];
    $body = $_POST['review_body'];
    $book_id = $_GET['book_id']; 

    // Validate form data
    if (empty($rating) || empty($title) || empty($body)) {
        // Handle validation error
        echo '<script>alert("Please fill in all the required fields.")</script>';
    } else {
        // Sanitize form data
        $rating = intval($rating);
        $title = htmlspecialchars($title);
        $body = htmlspecialchars($body);

        if (isset($_SESSION['user_id'])) {
            $uid = $_SESSION['user_id'];

            // Retrieve user information
            $sql = "SELECT username, email FROM users WHERE id = '$uid'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_assoc($result);

            // Construct the SQL query
            $review_name = $user['username'];
            $review_email = $user['email'];
            $sql = "INSERT INTO review (user_id, book_id, review_name, review_email, review_rating, review_title, review_body) VALUES ('$uid', '$book_id', '$review_name', '$review_email', $rating, '$title', '$body')";

            // Execute the query
            if ($conn->query($sql) === true) {
                // Data inserted successfully
                echo '<script>alert("Review submitted successfully!")</script>';
                echo "<script>window.location.href='product-detail.php?book_id=$book_id'</script>";
            } else {
                // Handle the error as desired
                echo "Error: " . $conn->error;
            }
        } else {
            echo '<script>alert("User ID not found. Please make sure you are logged in.")</script>';
        }
    }
}

// Close the database connection
$conn->close();
?>

			


