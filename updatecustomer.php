<?php
include "dbconn.php";
$sql = "select * from customers where id=?";
$id = $_REQUEST["id"];
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
}
// if($stmt->execute() === TRUE) {
//     echo "<script>window.location.href='customers.php'</script>";
// } 
// else {
//     echo "Error ";
// }
?>

<form action="upcustomer.php">
    <label for "fname">First Name:</label><br>
    <input type="text" id="fname" name="fname" value="<?php echo $row["FirstName"]?>"><br>
    <label for "lname">Last Name:</label><br>
    <input type="text" id="lname" name="lname" value="<?php echo $row["LastName"]?>"><br>
    <label for "email">Email:</label><br>
    <input type="email" id="email" name="email" value="<?php echo $row["Email"]?>"><br>
    
    <label for "addressline1">Street address:</label><br>
    <input type="text" id="addressline1" name="addressline1" value="<?php echo $row["AddressLine1"]?>"><br>
    <label for "addressline2">Street address line 2:</label><br>
    <input type="text" id="addressline2" name="addressline2" value="<?php echo $row["AddressLine2"]?>"><br>
    <label for "city">City:</label><br>
    <input type="text" id="city" name="city" value="<?php echo $row["City"]?>"><br>
    <label for "state">State:</label><br>
    <input type="text" id="state" name="state" value="<?php echo $row["State"]?>"><br>
    <label for "zipcode">Zip Code:</label><br>
    <input type="text" id="zipcode" name="zipcode" value="<?php echo $row["ZipCode"]?>"><br>
    <input type="hidden" id="id" name="id" value="<?php echo $row["id"]?>"><br>
    <input type="submit" value="Submit">
</form>

<a href="addOrder.php?id=<?php echo $row["id"]?>">Create Order</a>

<!--<a href='addOrder.php?id=" . $row["id"] . "'>Create Order</a>-->

// <?php
// include "orders.php";
// ?>