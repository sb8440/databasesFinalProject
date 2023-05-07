<?php
include_once "dbconn.php";
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST["id"];
    if(empty($id)) {
        include "menu.php";
        $sql = "SELECT o.id, o.Order_Date, concat(c.FirstName, ' ', c.LastName) as Customer_Name, r.Name as Restaurant_Name, o.TotalPrice FROM `orders` o inner join customers c on o.Customer_Id = c.id inner join restaurants r on o.Restaurant_Id = r.id order by o.Order_Date DESC";
    } else {
        $sql = "select * from orders where Customer_Id=" . $id;
    }
} else {
    include "menu.php";
    $sql = "SELECT o.id, o.Order_Date, o.Order_Status, concat(c.FirstName, ' ', c.LastName) as Customer_Name, r.Name as Restaurant_Name, o.TotalPrice FROM `orders` o inner join customers c on o.Customer_Id = c.id inner join restaurants r on o.Restaurant_Id = r.id order by o.Order_Date DESC";
}


echo "<h1>Orders<table border=1><tr><th>Order Date</th><th>Customer Id</th><th>Restaurant Id</th><th>Total Price</th><th>Order Status</th></tr>";
$result = $conn->query($sql);
if($result->num_rows > 0) {
    while($row=$result->fetch_assoc()) {
        echo "<tr><td>" . $row["Order_Date"] . "</td><td>" 
        . $row["Customer_Name"] . "</td><td>" 
        . $row["Restaurant_Name"] . "</td><td>" 
        . $row["TotalPrice"] . "</td><td>" 
        . $row["Order_Status"] 
        . "</td><td><a href='addOrderItems.php?orderId=" . $row["id"] . "'>Add Items in Order</a>"
        . "</td><td><a href='viewOrderItems.php?orderId=" . $row["id"] . "'>View and Edit Items in Order</a>"
        . "</td><td><a href='updateOrderStatusToComplete.php?orderId=" . $row["id"] . "'>Checkout and Update Order Status to Complete</a>"
        . "</td><td><a href='rateOrder.php?orderId=" . $row["id"] . "'>Rate Order</a>"
        . "</td><td><a href='ratings.php?id=" . $row["id"] . "'>View Rating</a>"
        . "</td><td><a href='delivery.php?orderId=" . $row["id"] . "'>View Delivery</a>"

        . "</td></tr>";
    }
}
echo "</table></h1>";
$conn->close();
?>