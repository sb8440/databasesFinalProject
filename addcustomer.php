<?php
include "dbconn.php";

// var_dump($_REQUEST);

$sql = "insert into customers (FirstName, LastName, Email, AddressLine1, AddressLine2, City, State, ZipCode) VALUES (?,?,?,?,?,?,?,?)";

$fname = $_REQUEST["fname"];
$lname = $_REQUEST["lname"];
$email = $_REQUEST["email"];
$addressline1 = $_REQUEST["addressline1"];
$addressline2 = $_REQUEST["addressline2"];
$city = $_REQUEST["city"];
$state = $_REQUEST["state"];
$zipcode = $_REQUEST["zipcode"];

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssss",$fname,$lname,$email,$addressline1,$addressline2,$city,$state,$zipcode);
if($stmt->execute() === TRUE) {
    echo "<script>window.location.href='customers.php'</script>";
} 
else {
    echo "Error " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>