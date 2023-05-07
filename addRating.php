<?php
include "dbconn.php";

var_dump($_REQUEST);

$sql = "insert into ratings (Order_Id, Rating, Comments) VALUES (?,?,?)";

$rating = $_REQUEST["rating"];
$comments = $_REQUEST["comments"];
$orderId = $_REQUEST["orderId"];

$stmt = $conn->prepare($sql);
$stmt->bind_param("iis",$orderId,$rating,$comments);
if($stmt->execute() === TRUE) {
    echo "<script>window.location.href='ratings.php?id=" . $orderId . "'</script>";
} 
else {
    echo "Error " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>