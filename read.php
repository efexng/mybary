<?php
include('db.php');


$sql = "SELECT * FROM Mybary";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Display records here
    }
} else {
    echo "No records found";
}

$mysqli->close();
?>
