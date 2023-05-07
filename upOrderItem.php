<?php
include "dbconn.php";

// var_dump($_REQUEST);

$sql = "update order_items set Quantity=? where id=?";

$id = $_REQUEST["id"];
$quantity = $_REQUEST["quantity"];

$stmt = $conn->prepare($sql);
$stmt->bind_param("ii",$quantity,$id);
if($stmt->execute() === TRUE) {
    echo "<script>window.location.href='viewOrderItems.php'</script>";
} 
else {
    echo "Error " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>