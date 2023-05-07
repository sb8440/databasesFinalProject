<?php
include "menu.php";
include "dbconn.php";
echo "<h1>Restaurants with Above Average Ratings (>3)<table border=1><tr><th>Restaurant Name</th><th>Rating</th></tr>";
$sql = "select * from restaurants_with_ratings_above3";
$result = $conn->query($sql);
if($result->num_rows > 0) {
    while($row=$result->fetch_assoc()) {
        echo "<tr><td>" . $row["Name"] . "</td><td>" 
        . $row["avg_rating"]
        . "</td></tr>";
    }
}
echo "</table></h1>";
$conn->close();
?>