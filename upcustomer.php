<?php
include "dbconn.php";

// var_dump($_REQUEST);

$sql = "update customers set FirstName=?, LastName=?, Email=?, AddressLine1=?, AddressLine2=?, City=?, State=?, ZipCode=? where id=?";

$id = $_REQUEST["id"];
$fname = $_REQUEST["fname"];
$lname = $_REQUEST["lname"];
$email = $_REQUEST["email"];
$addressline1 = $_REQUEST["addressline1"];
$addressline2 = $_REQUEST["addressline2"];
$city = $_REQUEST["city"];
$state = $_REQUEST["state"];
$zipcode = $_REQUEST["zipcode"];

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssi",$fname,$lname,$email,$addressline1,$addressline2,$city,$state,$zipcode,$id);
if($stmt->execute() === TRUE) {
    echo "<script>window.location.href='customers.php'</script>";
} 
else {
    echo "Error " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>