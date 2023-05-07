<?php
include "menu.php";
include "dbconn.php";
echo "<h1>Deliverer Information<table border=1><tr><th>FirstName</th><th>LastName</th><th>Phone</th><th>Vehicle Model</th><th>Vehicle License Plate</th></tr>";
$sql = "select * from deliverers";
$result = $conn->query($sql);
if($result->num_rows > 0) {
    while($row=$result->fetch_assoc()) {
        echo "<tr><td>" . $row["FirstName"] . "</td><td>" . $row["LastName"] . "</td><td>" 
        . $row["Phone"] . "</td><td>" 
        . $row["Vehicle_Model"] . "</td><td>" 
        . $row["Vehicle_License_Plate"]
        . "</td><td><a href='updatedeliverer.php?id=" . $row["id"] . "'>Edit</a>"
        . "</td><td><a href='deletedeliverer.php?id=" . $row["id"] . "'>Delete</a>"
        . "</td></tr>";
    }
}
echo "</table></h1>";
$conn->close();
?>

<a href="adddeliverer.htm">Add Deliverer Information</a>