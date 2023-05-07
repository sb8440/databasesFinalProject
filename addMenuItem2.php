<?php
include "dbconn.php";

$sql = "select * from restaurants";
$result = $conn->query($sql);
$restaurants = $result->fetch_all(MYSQLI_ASSOC);

// $sql = "insert into menuItems (Restaurant_Id, Name, Description, Price, Is_Vegetarian) VALUES (?,?,?,?,?)";

// $restaurant_id = $_REQUEST["restaurant_id"];
// $name = $_REQUEST["name"];
// $description = $_REQUEST["description"];
// $price = $_REQUEST["price"];
// $is_vegetarian = $_REQUEST["is_vegetarian"];

// $stmt = $conn->prepare($sql);
// $stmt->bind_param("issdi",$restaurant_id,$name,$description,$price,$is_vegetarian);
// if($stmt->execute() === TRUE) {
//     echo "<script>window.location.href='menuItems.php'</script>";
// } 
// else {
//     echo "Error " . $sql . "<br>" . $conn->error;
// }
// $conn->close();
?>

<form action="insertMenuItem2.php">
    <label for "restaurant_id">Restaurant Name:</label><br>
    <select id="restaurant_id" name="restaurant_id">
        <?php
        for ($i = 0; $i < count($restaurants); $i++) {
            echo '<option value = "' . $restaurants[$i]["id"];
            echo '">';
            echo $restaurants[$i]["Name"] . "</option>";
        }
        ?>
    </select></br>
    
    <!--<input type="text" id="restaurant_id" name="restaurant_id"><br>-->
    <label for "name">Name:</label><br>
    <input type="text" id="name" name="name"><br>
    <label for "description">Description:</label><br>
    <input type="text" id="description" name="description"><br>
    
    <label for "price">Price:</label><br>
    <input type="text" id="price" name="price"><br>
    <label for "is_vegetarian">Vegetarian</label><br>
    <input type="text" id="is_vegetarian" name="is_vegetarian"><br>
    <input type="submit" value="Submit">
</form>