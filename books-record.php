<?php
include('db.php');


// Run SQL query
$res = mysqli_query($mysqli, "SELECT id, Title, Author, Genre, Availability, Publisher, Reviews, TransactionID, PublishedDate, BookSeries, Pages FROM Mybary");


// Check for errors in the SQL statement
if (!$res) {
    print("MySQL error: " . mysqli_error($mysqli));
    exit;
}



if (isset($_GET['search_query'])) {
    $search_query = $_GET['search_query'];
    $search_category = $_GET['search_category'];

    $search_query = trim($search_query);

    // Construct the SQL query based on the selected search category
    switch ($search_category) {
        case 'Title':
            $query = "SELECT id, Title, Author, Genre, Availability, Publisher, Reviews, TransactionID, PublishedDate, BookSeries, Pages FROM Mybary WHERE Title LIKE '%$search_query%'";
            break;
        case 'Author':
            $query = "SELECT id, Title, Author, Genre, Availability, Publisher, Reviews, TransactionID, PublishedDate, BookSeries, Pages FROM Mybary WHERE Author LIKE '%$search_query%'";
            break;
        case 'Genre':
            $query = "SELECT id, Title, Author, Genre, Availability, Publisher, Reviews, TransactionID, PublishedDate, BookSeries, Pages FROM Mybary WHERE Genre LIKE '%$search_query%'";
            break;
        case 'Publisher':
            $query = "SELECT id, Title, Author, Genre, Availability, Publisher, Reviews, TransactionID, PublishedDate, BookSeries, Pages FROM Mybary WHERE Publisher LIKE '%$search_query%'";
            break;
    }
}




if (isset($_GET['viewAllBooks'])) {
    // User wants to view all books
    $query = "SELECT id, Title, Author, Genre, Availability, Publisher, Reviews, TransactionID, PublishedDate, BookSeries, Pages FROM Mybary";
}

if (isset($_GET['viewAllAvailableBooks'])) {
    // User wants to view all available books
    $query = "SELECT id, Title, Author, Genre, Availability, Publisher, Reviews, TransactionID, PublishedDate, BookSeries, Pages FROM Mybary WHERE Availability = 'In Stock'";
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
<h2>Book Records</h2>
<table border="1">
    <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Genre</th>
        <th>Availability</th>
        <th>Publisher</th>
        <th>Reviews</th>
        <th>TransactionID</th>
        <th>PublishedDate</th>
        <th>BookSeries</th>
        <th>Pages</th>
    </tr>

    <?php
    if (!empty($query)) {
        $result = mysqli_query($mysqli, $query);

        if (!$result) {
            print("MySQL error: " . mysqli_error($mysqli));
            exit;
        }

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["Title"] . "</td>";
                echo "<td>" . $row["Author"] . "</td>";
                echo "<td>" . $row["Genre"] . "</td>";
                echo "<td>" . $row["Availability"] . "</td>";
                echo "<td>" . $row["Publisher"] . "</td>";
                echo "<td>" . $row["Reviews"] . "</td>";
                echo "<td>" . $row["TransactionID"] . "</td>";
                echo "<td>" . $row["PublishedDate"] . "</td>";
                echo "<td>" . $row["BookSeries"] . "</td>";
                echo "<td>" . $row["Pages"] . "</td>";
                echo "<td><a href='update.php?id=" . $row["id"] . "'>Edit</a></td>";
                echo "<td><a href='delete.php?id=" . $row["id"] . "'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='11'>No books found</td></tr>";
        }
    } else {
        echo "<tr><td colspan='11'>No search criteria provided</td></tr>";
    }
    ?>
</table>

<?php
$Title = ''; // Define and initialize the variable

// You may retrieve the actual title from your data or a form input
// For example, you can set it from the data:
$Title = 'To Kill a Mockingbird';

if ($Title === 'To Kill a Mockingbird') {
    // Display the image for To Kill a Mockingbird
    ?>
    <img src="https://covers.openlibrary.org/b/id/12606567-L.jpg">
    <?php
}
?>


</body>
</html>
