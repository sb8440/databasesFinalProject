<?php
include "dbconn.php";

// var_dump($_REQUEST);

$sql = "insert into restaurants (Name, AddressLine1, AddressLine2, City, State, ZipCode, Phone) VALUES (?,?,?,?,?,?,?)";

$name = $_REQUEST["name"];
$addressline1 = $_REQUEST["addressline1"];
$addressline2 = $_REQUEST["addressline2"];
$city = $_REQUEST["city"];
$state = $_REQUEST["state"];
$zipcode = $_REQUEST["zipcode"];
$phone = $_REQUEST["phone"];


$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss",$name,$addressline1,$addressline2,$city,$state,$zipcode,$phone);
if($stmt->execute() === TRUE) {
    echo "<script>window.location.href='restaurants.php'</script>";
} 
else {
    echo "Error " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>