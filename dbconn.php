<?php
header("Cache-Control: no-cache");
$servername = "localhost";
$username = "u469653562_customers";
$password = "ecommerceDB907";
$db_name = "u469653562_customers";

$conn = new mysqli($servername, $username, $password, $db_name);
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}
?>

