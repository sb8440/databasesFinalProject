<?php
include "dbconn.php";

var_dump($_REQUEST);

$sql = "insert into orders (Customer_Id, Restaurant_Id, TotalPrice, Order_Date) VALUES (?,?,?,NOW())";


$customer_id = $_REQUEST["customer_id"];
$restaurant_id = $_REQUEST["restaurant_id"];
$totalPrice = 0;

$stmt = $conn->prepare($sql);
$stmt->bind_param("iii",$customer_id,$restaurant_id,$totalPrice);
if($stmt->execute() === TRUE) {
    echo "<script>window.location.href='orders.php'</script>";
} 
else {
    echo "Error " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>