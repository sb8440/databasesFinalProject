<?php
include "dbconn.php";

?>

<form action="addRating.php">
    <label for "rating">Rating:</label><br>
    <input type="text" id="rating" name="rating"><br>
    <label for "comments">Comments:</label><br>
    <input type="text" id="comments" name="comments"><br>
    <input type="hidden" id="orderId" name="orderId" value="<?php echo $_REQUEST["orderId"]?>"><br>
    <input type="submit" value="Submit">
</form>