<?php
include "dbconn.php";
var_dump($_REQUEST);
$sql = "insert into order_items (Order_Id, Menu_Item_Id, Quantity) VALUES (?,?,?)";

$orderId = $_REQUEST["orderId"];
$menuItemId = $_REQUEST["menuItemId"];
$quantity = $_REQUEST["quantity"];

$stmt = $conn->prepare($sql);
$stmt->bind_param("iii",$orderId,$menuItemId,$quantity);
if($stmt->execute() === TRUE) {
    echo "<script>window.location.href='orders.php'</script>";
} 
else {
    echo "Error " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>