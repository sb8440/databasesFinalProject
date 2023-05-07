<?php
include "dbconn.php";

// var_dump($_REQUEST);

$sql = "update restaurants set Name=?, AddressLine1=?, AddressLine2=?, City=?, State=?, ZipCode=?, Phone=? where id=?";

$id = $_REQUEST["id"];
$name = $_REQUEST["name"];
$addressline1 = $_REQUEST["addressline1"];
$addressline2 = $_REQUEST["addressline2"];
$city = $_REQUEST["city"];
$state = $_REQUEST["state"];
$zipcode = $_REQUEST["zipcode"];
$phone = $_REQUEST["phone"];

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssi",$name,$addressline1,$addressline2,$city,$state,$zipcode,$phone,$id);
if($stmt->execute() === TRUE) {
    echo "<script>window.location.href='restaurants.php'</script>";
} 
else {
    echo "Error " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>