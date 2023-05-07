<?php
include "dbconn.php";
$sql = "select mi.Name, mi.Price, oi.Quantity, oi.id from order_items oi join menuItems mi on oi.Menu_Item_Id=mi.id where oi.id=?";
$id = $_REQUEST["orderItemId"];
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
}
?>

<form action="upOrderItem.php">
    <label for "name">Name:</label><br>
    <input type="text" id="name" name="name" readonly=True value="<?php echo $row["Name"]?>"><br>
    <label for "price">Price:</label><br>
    <input type="text" id="price" name="price" readonly=True value="<?php echo $row["Price"]?>"><br>
    <label for "quantity">Quantity:</label><br>
    <input type="text" id="quantity" name="quantity" value="<?php echo $row["Quantity"]?>"><br>
    <input type="hidden" id="id" name="id" value="<?php echo $row["id"]?>"><br>
    <input type="submit" value="Submit">
</form>