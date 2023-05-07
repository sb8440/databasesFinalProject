<?php
include "dbconn.php";

$sql = "select * from restaurants";
$result = $conn->query($sql);
$restaurants = $result->fetch_all(MYSQLI_ASSOC);
// $array = explode('-', $_REQUEST);


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

<form action="insertOrder.php">
    <label for "restaurant_id">Restaurant Name:</label><br>
    <select id="restaurant_id" name="restaurant_id">
        <?php
            for ($i=0;$i < count($restaurants);$i++) {
                echo '<option value = "' . $restaurants[$i]["id"];
                // if ($restaurants[$i]["id"] == $row["Restaurant_Id"]) {
                //     echo '" selected>';
                //     " selected";
                // } else {
                //     echo '">';
                // }
                // echo '"  selected>';
                echo '">';
                echo $restaurants[$i]["Name"] . "</option>";
                // echo '"<option value = "' . $restaurants[$i]["id"] . '">' . $restaurants[$i]["Name"] . "</option>";
            }
        ?>
    </select></br>
    <input type="hidden" id="customer_id" name="customer_id" value="<?php echo $_REQUEST["id"]?>"><br>
    <!--<input type="text" id="restaurant_id" name="restaurant_id"><br>-->
    <input type="submit" value="Create Order">
</form>