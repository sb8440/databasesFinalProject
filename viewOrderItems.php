<?php
include "dbconn.php";


if (isset($_REQUEST['orderId'])) {
    $id = $_REQUEST["orderId"];
    if(empty($id)) {
        include "menu.php";
        $sql = "select mi.Name, mi.Price, oi.Quantity, oi.id from order_items oi join menuItems mi on oi.Menu_Item_Id=mi.id";
    } else {
        $sql = "select mi.Name, mi.Price, oi.Quantity, oi.id from order_items oi join menuItems mi on oi.Menu_Item_Id=mi.id where oi.Order_Id=" . $id;
    }
} else {
    include "menu.php";
    $sql = "select mi.Name, mi.Price, oi.Quantity, oi.id from order_items oi join menuItems mi on oi.Menu_Item_Id=mi.id";
}


// $sql = "select mi.Name, mi.Price, oi.Quantity from order_items oi join menuItems mi on oi.Menu_Item_Id=mi.id where oi.Order_Id=?";

echo "<h1>Order Items<table border=1><tr><th>Name</th><th>Price</th><th>Quantity</th></tr>";
$result = $conn->query($sql);
if($result->num_rows > 0) {
    while($row=$result->fetch_assoc()) {
        echo "<tr><td>" . $row["Name"] . "</td><td>" 
        . $row["Price"] . "</td><td>"
        . $row["Quantity"] 
        . "</td><td><a href='editOrderItemQuantity.php?orderItemId=" . $row["id"] . "'>Edit Order Item</a>"
        . "</td><td><a href='deleteOrderItem.php?orderItemId=" . $row["id"] . "'>Delete Order Item</a>"
        . "</td></tr>";
    }
}
echo "</table></h1>";
$conn->close();
?>