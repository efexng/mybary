<?php
include('db.php');





$search = '';

if (isset($_GET['search'])) {
    $search = $_GET['search'];
}


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Search for Book Records</h1>

<!-- Form to search by Title -->
<form action="books-record.php" method="GET">
    <label for="search_title">Search by Title:</label>
    <input type="text" name="search_title" id="search_title" required>
    <button type="submit">Search</button>
</form>

<!-- Form to search by Author -->
<form action="books-record.php" method="GET">
    <label for="search_author">Search by Author:</label>
    <input type="text" name="search_author" id="search_author" required>
    <button type="submit">Search</button>
</form>

<!-- Form to search by Genre -->
<form action="books-record.php" method="GET">
    <label for="search_genre">Search by Genre:</label>
    <input type="text" name="search_genre" id="search_genre" required>
    <button type="submit">Search</button>
</form>
<!-- Form to search by Genre -->
<form action="books-record.php" method="GET">
    <label for="search_publisher">Search by Publisher:</label>
    <input type="text" name="search_publisher" id="search_publisher" required>
    <button type="submit">Search</button>
</form>


</body>
</html>