<?php
include "connect.php";

$sql = sprintf("SELECT * FROM users
                WHERE email = '%s'",
                $conn->real_escape_string($_GET["uemail"]));

$result = mysqli_query($conn, $sql);

$is_available = $result->num_rows === 0;

header("Content-Type: application/json");

echo json_encode(["available" => $is_available]);
?>