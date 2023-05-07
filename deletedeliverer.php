<?php

include "dbconn.php";
$sql = "delete from deliverers where id=?";
$id = $_REQUEST["id"];
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
if($stmt->execute() === TRUE) {
    echo "<script>window.location.href='deliverers.php'</script>";
} 
else {
    echo "Error ";
}
$conn->close();
?>