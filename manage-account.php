<?php

session_start();
if (!isset($_SESSION['username'])) {
    echo "Not logged in"; // Debugging statement
    header("Location: login.php");
    exit();
}
// Check if the user is logged in (you can implement login functionality)
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$search = '';

if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Account</title>
</head>
<body>
<title>Library Catalog</title>
    <style>
        /* Basic CSS for styling the page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }

        nav {
            background-color: #444;
            text-align: center;
            padding: 10px 0;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to Our Library Catalog, <?php echo $_SESSION['username']; ?></h1>
        <p>This is your account page.</p>
    </header>

    <nav>
    <a href="books-record.php?viewAllBooks=true">View All Books</a>
    <a href="books-record.php?viewAllAvailableBooks=true">View All Available Books</a>
    <a href="manage-account.php">Manage Account</a>
    <a href="logout.php">Logout</a>
</nav>

<form action="books-record.php" method="GET">
    <label for="search_query">Search:</label>
    <input type="text" name="search_query" id="search_query" required>

    <label for="search_category">Search by:</label>
    <select name="search_category" id="search_category">
        <option value="Title">Title</option>
        <option value="Author">Author</option>
        <option value="Genre">Genre</option>
        <option value="Publisher">Publisher</option>
    </select>

    <button type="submit">Search</button>
</form>


    
    <div>
        <h2>Featured Books</h2>
        <!-- Add featured book listings here -->
    </div>

    <footer>
        <p>&copy; 2023 Your Library Catalog</p>
    </footer>


</body>
</html>