<?php
include('db.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM Mybary WHERE id = '$id'";

    if ($mysqli->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    $mysqli->close();
}
?>
