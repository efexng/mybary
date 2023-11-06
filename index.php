<?php
include('db.php');
include('create.php');
include('read.php');
include('delete.php');
include('update.php');

// Run SQL query
$res = mysqli_query($mysqli, "SELECT id, Title, Author, Genre, Availability, Publisher, Reviews, TransactionID, PublishedDate, BookSeries, Pages FROM Mybary");

$bookData = array();
for ($i = 0; $i < 5 && ($row = mysqli_fetch_assoc($res)); $i++) {
    $bookData[] = $row;
}


// Check for errors in the SQL statement
if (!$res) {
    print("MySQL error: " . mysqli_error($mysqli));
    exit;
}



$search = '';

if (isset($_GET['search'])) {
    $search = $_GET['search'];
}


?>


<!DOCTYPE html>
<html>
<head>
    <title>Mybary - Book Records</title>
</head>
<body>


<h1>Mybary - Book Records</h1>


<!-- Add a new record -->
<h2>Add a Book</h2>
<form action="create.php" method="POST">
    <label for="title">Title:</label>
    <input type="text" name="title" required><br>

    <label for="author">Author:</label>
    <input type="text" name="author" required><br>

    <label for="genre">Genre:</label>
    <input type="text" name="genre" required><br>

    <label for="availability">Availability:</label>
    <input type="text" name="availability" required><br>

    <label for="publisher">Publisher:</label>
    <input type="text" name="publisher" required><br>

    <label for="reviews">Reviews:</label>
    <input type="text" name="reviews" required><br>


    <label for="transactionID">Transaction ID:</label>
    <input type="text" name="transactionID" required><br>

    <label for="publishedDate">Published Date:</label>
    <input type="date" name="publishedDate" required><br>

    <label for="bookSeries">Book Series:</label>
    <input type="text" name="bookSeries" required><br>

    <label for="pages">Pages:</label>
    <input type="text" name="pages" required><br>

    <button type="submit">Add Record</button>
</form>



</body>
</html>
