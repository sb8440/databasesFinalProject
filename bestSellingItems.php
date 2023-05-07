<?php
include "menu.php";
include "dbconn.php";
echo "<h1>Best Selling Items<table border=1><tr><th>Menu Item Name</th><th>Order Count</th><th>Order Total</th></tr>";
$sql = "select * from best_selling_items";
$result = $conn->query($sql);
if($result->num_rows > 0) {
    while($row=$result->fetch_assoc()) {
        echo "<tr><td>" . $row["Name"] . "</td><td>" . $row["order_count"] . "</td><td>" 
        . $row["order_total"]
        . "</td></tr>";
    }
}
echo "</table></h1>";
$conn->close();
?>