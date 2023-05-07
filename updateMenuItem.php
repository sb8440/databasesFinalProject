<?php
include "dbconn.php";
// var_dump($_REQUEST);

// $sql = "select * from restaurants";
// $result = $conn->query($sql);
// $restaurants = $result->fetch_all(MYSQLI_ASSOC);
// var_dump($restaurants);

$sql = "select * from menuItems where id=? and Restaurant_Id=?";
$array = explode('-', $_REQUEST["key"]);
$restaurant_id = $array[0];
$menu_item_id = $array[1];
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $menu_item_id, $restaurant_id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
}
?>

<form action="upMenuItem.php">
    <label for "restaurant_id">Restaurant Name:</label><br>
    <input type="text" id="restaurant_id" name="restaurant_id" readonly=True value="<?php echo $row["Restaurant_Id"]?>"><br>
    <label for "name">Name:</label><br>
    <input type="text" id="name" name="name" value="<?php echo $row["Name"]?>"><br>
    <label for "description">Description:</label><br>
    <input type="text" id="description" name="description" value="<?php echo $row["Description"]?>"><br>
    
    <label for "price">Price:</label><br>
    <input type="text" id="price" name="price" value="<?php echo $row["Price"]?>"><br>
    <label for "is_vegetarian">Is Vegetarian:</label><br>
    <input type="text" id="is_vegetarian" name="is_vegetarian" value="<?php echo $row["Is_Vegetarian"]?>"><br>
    <hidden name="oldMenuId" value="<?php echo $row["id"]?>"></hidden>
    <input type="hidden" id="id" name="id" value="<?php echo $row["id"]?>"><br>
    <input type="submit" value="Submit">
</form>