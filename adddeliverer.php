<?php
include "dbconn.php";

var_dump($_REQUEST);

$sql = "insert into deliverers (FirstName, LastName, Phone, Vehicle_Model, Vehicle_License_Plate) VALUES (?,?,?,?,?)";

$fname = $_REQUEST["fname"];
$lname = $_REQUEST["lname"];
$phone = $_REQUEST["phone"];
$vehicleModel = $_REQUEST["vehicleModel"];
$vehicleLicensePlate = $_REQUEST["vehicleLicensePlate"];

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss",$fname,$lname,$phone,$vehicleModel,$vehicleLicensePlate);
if($stmt->execute() === TRUE) {
    echo "<script>window.location.href='deliverers.php'</script>";
} 
else {
    echo "Error " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>