<?php
include "dbconn.php";

var_dump($_REQUEST);

$sql = "update orders set Order_Status='Ordered' where id=?";

$orderId = $_REQUEST["orderId"];

$stmt = $conn->prepare($sql);
$stmt->bind_param("s",$orderId);
if($stmt->execute() === TRUE) {
    echo "<script>window.location.href='orders.php'</script>";
} 
else {
    echo "Error " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>