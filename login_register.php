<?php
session_start();
include("db.php");


if (isset($_COOKIE['username']) && isset($_COOKIE['password'])){
    $id=$_COOKIE['username'];
    $pass=$_COOKIE['password'];
} else {
    $id="";
    $pass="";
}
    

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <script src="./script.js" defer></script>
    <title>Document</title>
</head>
<body>
    <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                <button type="button" class="toggle-btn" onclick="register()">Sign up</button>
            </div>
            <div class="social-icons">
                <img src="google.png" alt="">
                <img src="facebook.png" alt="">
                <img src="x.png" alt="">
            </div>
            <form id="login" class="user-input" method="post" action="user-login.php">
                <input type="text" class="input-field" name="username" placeholder="Enter Email/Username" value="<?php echo $id; ?>" required>
                <input type="password" class="input-field" name="password" placeholder="Enter Password" value="<?php echo $pass; ?>" required>
                <input type="checkbox" class="check-box" name="remember_me"><span>Remember me</span>
                <button type="submit" class="submit-btn">Log in</button>
                <?php
                if (isset($_SESSION['login_error'])) {
                    echo '<p class="error-message">' . $_SESSION['login_error'] . '</p>';
                    unset($_SESSION['login_error']); // Clear the error message
                }
                ?>
            </form>
            <form id="register" class="user-input" method="POST" action="user-register.php">
                <input type="text" class="input-field" name="username" placeholder="UserID">
                <input type="email" class="input-field" name="email" placeholder="Enter Email Address">
                <input type="password" class="input-field" name="password"  placeholder="Enter Password">
                <input type="checkbox" class="check-box" required><span>I agree to the terms and conditions</span>
                <button type="submit" class="submit-btn">Register</button>
                <?php
                if (isset($_SESSION['registration_error'])) {
                    echo '<div class="error-message">' . $_SESSION['registration_error'] . '</div>';
                    unset($_SESSION['registration_error']); // Clear the error message
                }
                ?>
            </form>
        </div>
    </div>
</body>
</html>
