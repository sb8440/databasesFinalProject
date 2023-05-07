<?php
include_once "dbconn.php";

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST["id"];
    if(empty($id)) {
        include "menu.php";
        $sql = "SELECT * FROM ratings";
    } else {
        $sql = "SELECT * FROM ratings where Order_Id=" . $id;
    }
} else {
    include "menu.php";
    $sql = "SELECT * FROM ratings";
}


echo "<h1>Ratings<table border=1><tr><th>Order Id</th><th>Rating</th><th>Comments</th></tr>";
$result = $conn->query($sql);
if($result->num_rows > 0) {
    while($row=$result->fetch_assoc()) {
        echo "<tr><td>" . $row["Order_Id"] . "</td><td>" 
        . $row["Rating"] . "</td><td>"
        . $row["Comments"] 
        . "</td></tr>";
    }
}
echo "</table></h1>";
$conn->close();
?>