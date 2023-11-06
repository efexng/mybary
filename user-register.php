<?php
session_start();
include 'db.php';

// Retrieve user input
$email = $_POST['email'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

// Check if the username or email already exists
$sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['registration_error'] = "Username or email already exists. Please choose a different one.";
    header("Location: login_register.php"); // Redirect back to the registration page
    exit();
} else {
    // Insert the new user into the database
    $insert_sql = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')";
    if ($mysqli->query($insert_sql) === TRUE) {
        // Start the session and set the 'username' session variable
        $_SESSION['username'] = $username;

        // Redirect to the dashboard
        header("Location: manage-account.php");
        exit();
    } else {
        $_SESSION['registration_error'] = "Error: " . $insert_sql . "<br>" . $mysqli->error;
        header("Location: login_register.php"); // Redirect back to the registration page
        exit();
    }
}
?>