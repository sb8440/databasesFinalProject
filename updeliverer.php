<?php
include "dbconn.php";


$sql = "update deliverers set FirstName=?, LastName=?, Phone=?, Vehicle_Model=?, Vehicle_License_Plate=? where id=?";

$id = $_REQUEST["id"];
$fname = $_REQUEST["fname"];
$lname = $_REQUEST["lname"];
$phone = $_REQUEST["phone"];
$vehicleModel = $_REQUEST["vehicleModel"];
$vehicleLicensePlate = $_REQUEST["vehicleLicensePlate"];

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssi",$fname,$lname,$phone,$vehicleModel,$vehicleLicensePlate,$id);
if($stmt->execute() === TRUE) {
    echo "<script>window.location.href='deliverers.php'</script>";
} 
else {
    echo "Error " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>