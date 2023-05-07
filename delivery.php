<?php
include_once "dbconn.php";

if (isset($_REQUEST['orderId'])) {
    $id = $_REQUEST["orderId"];
    if(empty($id)) {
        include "menu.php";
        $sql = "SELECT * FROM delivery d join deliverers de on d.Deliverer_Id = de.id";
    } else {
        $sql = "SELECT * FROM delivery d join deliverers de on d.Deliverer_Id = de.id where d.Order_Id=" . $id;
    }
} else {
    include "menu.php";
    $sql = "SELECT * FROM delivery d join deliverers de on d.Deliverer_Id = de.id";
}


echo "<h1>Delivery<table border=1><tr><th>Deliverer First Name</th><th>Deliverer Last Name</th><th>Deliverer Phone</th><th>Vehicle Model</th><th>Vehicle License Plate</th><th>Delivery Status</th></tr>";
$result = $conn->query($sql);
if($result->num_rows > 0) {
    while($row=$result->fetch_assoc()) {
        echo "<tr><td>" . $row["FirstName"] . "</td><td>" 
        . $row["LastName"] . "</td><td>"
        . $row["Phone"] . "</td><td>"
        . $row["Vehicle_Model"] . "</td><td>"
        . $row["Vehicle_License_Plate"] . "</td><td>"
        . $row["Delivery_Status"] 
        . "</td></tr>";
    }
}
echo "</table></h1>";
$conn->close();
?>