<?php
include_once "dbconn.php";
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST["id"];
    if(empty($id)) {
        include "menu.php";
        $sql = "select * from menuItems";
    } else {
        $sql = "select * from menuItems where Restaurant_Id=" . $id;
    }
} else {
    include "menu.php";
    $sql = "select * from menuItems";
}


echo "<h1>Menu Items<table border=1><tr><th>Restaurant</th><th>Name</th><th>Description</th><th>Price</th><th>Is Vegetarian</th></tr>";
$result = $conn->query($sql);
if($result->num_rows > 0) {
    while($row=$result->fetch_assoc()) {
        $key = $row["Restaurant_Id"] . "-" . $row["id"];
        echo "<tr><td>" . $row["Restaurant_Id"] . "</td><td>" 
        . $row["Name"] . "</td><td>" 
        . $row["Description"] . "</td><td>" 
        . $row["Price"] . "</td><td>" 
        . $row["Is_Vegetarian"]
        . "</td><td><a href='updateMenuItem.php?key=" . $key . "'>Edit</a>"
        . "</td><td><a href='deleteMenuItem.php?key=" . $key . "'>Delete</a>"
        . "</td></tr>";
    }
}
echo "</table></h1>";
$conn->close();
?>
<a href="addMenuItem2.php">Add Menu Items</a>