<?php

include "dbconn.php";
$sql = "delete from customers where id=?";
$id = $_REQUEST["id"];
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
if($stmt->execute() === TRUE) {
    echo "<script>window.location.href='customers.php'</script>";
} 
else {
    echo "Error ";
}
$conn->close();
?>