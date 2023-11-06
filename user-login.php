<?php
session_start();
include("db.php");

$login_identifier = $_POST['username']; // The user can enter either their email or username
$password = $_POST['password'];

// Check if the login identifier is an email or a username
$sql = "SELECT * FROM users WHERE username = '$login_identifier' OR email = '$login_identifier'";
$result = $mysqli->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $_SESSION['username'] = $row['username'];
        header("Location: manage-account.php");
    } else {
        $_SESSION['login_error'] = "Username or password not correct.";
        $_SESSION['entered_username'] = $login_identifier; // Store the entered email/username
        header("Location: login_register.php");
    }
} else {
    $_SESSION['login_error'] = "User not found.";
    $_SESSION['entered_username'] = $login_identifier; // Store the entered email/username
    header("Location: login_register.php");
}

$mysqli->close();
?>
