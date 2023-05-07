<?php
include "menu.php";
include "dbconn.php";
echo "<h1>Customer Information<table border=1><tr><th>FirstName</th><th>LastName</th><th>AddressLine1</th><th>AddressLine2</th><th>City</th><th>State</th><th>ZipCode</th><th>Email</th></tr>";
$sql = "select * from customers";
$result = $conn->query($sql);
if($result->num_rows > 0) {
    while($row=$result->fetch_assoc()) {
        echo "<tr><td>" . $row["FirstName"] . "</td><td>" . $row["LastName"] . "</td><td>" 
        . $row["AddressLine1"] . "</td><td>" 
        . $row["AddressLine2"] . "</td><td>" 
        . $row["City"] . "</td><td>" 
        . $row["State"] . "</td><td>" 
        . $row["ZipCode"] . "</td><td>" 
        . $row["Email"]
        . "</td><td><a href='updatecustomer.php?id=" . $row["id"] . "'>Edit</a>"
        . "</td><td><a href='deletecustomer.php?id=" . $row["id"] . "'>Delete</a>"
        . "</td></tr>";
    }
}
echo "</table></h1>";
$conn->close();
?>

<a href="addcustomer.htm">Create Customer Information</a>