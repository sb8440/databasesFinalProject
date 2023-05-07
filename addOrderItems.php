<?php
include "dbconn.php";

$sql = "select mi.id, mi.Name from menuItems mi inner join orders o on o.Restaurant_Id=mi.Restaurant_Id where o.id=?";
$orderId = $_REQUEST["orderId"];
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $orderId);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $menuItems = $result->fetch_all(MYSQLI_ASSOC);
}
?>

<form action="insertOrderItems.php">
    <label for "menuItemId">Menu Item Name:</label><br>
    <select id="menuItemId" name="menuItemId">
        <?php
        for ($i = 0; $i < count($menuItems); $i++) {
            echo '<option value = "' . $menuItems[$i]["id"];
            echo '">';
            echo $menuItems[$i]["Name"] . "</option>";
        }
        ?>
    </select></br>
    <label for "quantity">Quantity:</label><br>
    <input type="text" id="quantity" name="quantity"><br>
    <input type="hidden" id="id" name="orderId" value="<?php echo $orderId?>"><br>
    <input type="submit" value="Submit">
</form>