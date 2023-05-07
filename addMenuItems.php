<?php
include "dbconn.php";

// var_dump($_REQUEST);

$sql = "insert into menuItems (Restaurant_Id, Name, Description, Price, Is_Vegetarian) VALUES (?,?,?,?,?)";

$restaurant_id = $_REQUEST["restaurant_id"];
$name = $_REQUEST["name"];
$description = $_REQUEST["description"];
$price = $_REQUEST["price"];
$is_vegetarian = $_REQUEST["is_vegetarian"];

$stmt = $conn->prepare($sql);
$stmt->bind_param("issdi",$restaurant_id,$name,$description,$price,$is_vegetarian);
if($stmt->execute() === TRUE) {
    echo "<script>window.location.href='menuItems.php'</script>";
} 
else {
    echo "Error " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>