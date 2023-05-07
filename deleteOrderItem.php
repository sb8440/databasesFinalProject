<?php

include "dbconn.php";
$sql = "delete from order_items where id=?";
$id = $_REQUEST["orderItemId"];
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
if($stmt->execute() === TRUE) {
    echo "<script>window.location.href='orders.php'</script>";
} 
else {
    echo "Error ";
}
$conn->close();
?>
