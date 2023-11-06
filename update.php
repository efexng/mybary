<?php
// Include the database connection code
include('db.php');

$successMessage = ""; // Initialize an empty success message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission

    // Retrieve the 'id' from the hidden input field in the form
    $id = $_POST["id"];

    $title = $_POST["Title"];
    $author = $_POST["Author"];
    $genre = $_POST["Genre"];
    $availability = $_POST["Availability"];
    $publisher = $_POST["Publisher"];
    $reviews = $_POST["Reviews"];
    $transactionID = $_POST["TransactionID"];
    $publishedDate = $_POST["PublishedDate"];
    $bookSeries = $_POST["BookSeries"];
    $pages = $_POST["Pages"];

    $sql = "UPDATE Mybary SET 
        Title = '$title', Author = '$author', Genre = '$genre', 
        Availability = '$availability', Publisher = '$publisher', 
        Reviews = '$reviews', TransactionID = '$transactionID', 
        PublishedDate = '$publishedDate', BookSeries = '$bookSeries', 
        Pages = '$pages' 
        WHERE id = '$id' ";

    if ($mysqli->query($sql) === TRUE) {
        $successMessage = "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    $mysqli->close();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query the database to fetch the book details based on the provided title
    $query = "SELECT * FROM Mybary WHERE id = '$id'";
    $result = mysqli_query($mysqli, $query);

    if (!$result) {
        // Handle database query errors
        die("Database query failed: " . mysqli_error($mysqli));
    }

    // Fetch the book details from the result
    $book = mysqli_fetch_assoc($result);

    // Check if the book was found
    if ($book) {
        // Proceed to create the form for editing the book details

        // Display the book record
        echo '<h3>Book Record</h3>';
        echo '<table border="1"  style="margin-top: 60px;">';
        foreach ($book as $key => $value) {
            echo '<tr>';
            echo '<td>' . $key . '</td>';
            echo '<td>' . $value . '</td>';
            echo '</tr>';
        }
        echo '</table>';



        // Display the editing form
        echo '<h3>Edit Book Record</h3>';
        echo '<form method="POST" action="update.php" style="margin-top: 60px;">';
        echo '<input type="hidden" name="id" value="' . $id . '">';
        foreach ($book as $key => $value) {
            if ($key === 'id') {
                continue; // Skip 'id' in the loop
            }
            echo '<label for="' . $key . '">' . $key . ':</label>';
            echo '<input type="text" name="' . $key . '" value="' . $value . '" required><br>';
        }
        echo '<input type="submit" value="Update Record">';
        echo '</form';
    } else {
        // Handle the case where the book with the provided ID was not found
        echo 'Book not found.';
    }
} 

// Display the success message (if available)
echo $successMessage;
?>
