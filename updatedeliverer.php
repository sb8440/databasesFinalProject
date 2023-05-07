<?php
include "dbconn.php";
$sql = "select * from deliverers where id=?";
$id = $_REQUEST["id"];
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
}
?>

<form action="updeliverer.php">
    <label for "fname">First Name:</label><br>
    <input type="text" id="fname" name="fname" value="<?php echo $row["FirstName"]?>"><br>
    <label for "lname">Last Name:</label><br>
    <input type="text" id="lname" name="lname" value="<?php echo $row["LastName"]?>"><br>
    <label for "email">Phone:</label><br>
    <input type="text" id="phone" name="phone" value="<?php echo $row["Phone"]?>"><br>
    
    <label for "vehicleModel">Vehicle Model:</label><br>
    <input type="text" id="vehicleModel" name="vehicleModel" value="<?php echo $row["Vehicle_Model"]?>"><br>
    <label for "vehicleLicensePlate">Vehicle License Plate:</label><br>
    <input type="text" id="vehicleLicensePlate" name="vehicleLicensePlate" value="<?php echo $row["Vehicle_License_Plate"]?>"><br>
    <input type="hidden" id="id" name="id" value="<?php echo $row["id"]?>"><br>
    <input type="submit" value="Submit">
</form>