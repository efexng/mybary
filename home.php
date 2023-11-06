<?php
include('db.php');

// Run SQL query
$res = mysqli_query($mysqli, "SELECT id, Title, Author, Genre, Availability, Publisher, Reviews, TransactionID, PublishedDate, BookSeries, Pages FROM Mybary");

$bookData = array();  // Initialize an empty array to store the book data

while ($row = mysqli_fetch_assoc($res)) {
    $bookData[] = $row;
}

// Check for errors in the SQL statement
if (!$res) {
    print("MySQL error: " . mysqli_error($mysqli));
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./mystyle.css">
</head>
<body>
    <img src="/Users/efeapoki/Library/Application Support/Code/User/globalStorage/humy2833.ftp-simple/remote-workspace-temp/7522088e417c794c1392515f6c631c08/home/stud/1/2123563/public_html/schoolproject/mybary/Beige Watercolor Leaf Blank Notepaper 8.5 x 11 Letter (550 x 604 px) (200 x 200 px) (1).png" alt="" srcset="">
</body>
</html>