<?php
include "dbconn.php";

// var_dump($_REQUEST);

$sql = "update menuItems set Name=?, Description=?, Price=?, Is_Vegetarian=? where id=? and Restaurant_Id=?";

$id = $_REQUEST["id"];
$restaurant_id = $_REQUEST["restaurant_id"];
$name = $_REQUEST["name"];
$description = $_REQUEST["description"];
$price = $_REQUEST["price"];
$is_vegetarian = $_REQUEST["is_vegetarian"];

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssdiii",$name,$description,$price,$is_vegetarian,$id,$restaurant_id);
if($stmt->execute() === TRUE) {
    echo "<script>window.location.href='menuItems.php'</script>";
} 
else {
    echo "Error " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>