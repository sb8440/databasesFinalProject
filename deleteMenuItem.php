<?php

include "dbconn.php";
$array = explode('-', $_REQUEST["key"]);
$restaurant_id = $array[0];
$menu_item_id = $array[1];
$sql = "delete from menuItems where id=? and Restaurant_Id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $menu_item_id, $restaurant_id);
if($stmt->execute() === TRUE) {
    echo "<script>window.location.href='menuItems.php'</script>";
} 
else {
    echo "Error ";
}
$conn->close();
?>