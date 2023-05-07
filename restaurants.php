<?php
include "menu.php";
include "dbconn.php";
echo "<h1>Restaurant Information<table border=1><tr><th>Name</th><th>AddressLine1</th><th>AddressLine2</th><th>City</th><th>State</th><th>ZipCode</th><th>Phone</th></tr>";
$sql = "select * from restaurants";
$result = $conn->query($sql);
if($result->num_rows > 0) {
    while($row=$result->fetch_assoc()) {
        echo "<tr><td>" . $row["Name"] . "</td><td>" 
        . $row["AddressLine1"] . "</td><td>" 
        . $row["AddressLine2"] . "</td><td>" 
        . $row["City"] . "</td><td>" 
        . $row["State"] . "</td><td>" 
        . $row["ZipCode"] . "</td><td>" 
        . $row["Phone"]
        . "</td><td><a href='updaterestaurant.php?id=" . $row["id"] . "'>Edit</a>"
        . "</td><td><a href='deleterestaurant.php?id=" . $row["id"] . "'>Delete</a>"
        . "</td></tr>";
    }
}
echo "</table></h1>";
$conn->close();
?>

<a href="addrestaurant.htm">Create Restaurant Information</a>