<?php

$sname = "localhost";
$uname = "root";
$dbpassword ="";
$db_name = "bookstore";

$conn = mysqli_connect($sname, $uname, $dbpassword, $db_name);

if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
  }
?>