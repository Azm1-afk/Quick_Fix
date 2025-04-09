<?php
// Start the session (if not already started)
session_start();

// Include the database connection file
require_once '../db.php';

// Initialize variables to store messages
$error_message = "";
$success_message = "";

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    // Redirect to the home page or dashboard
    header("Location: home.php"); //  Change to your home page
    exit();
}

// Process the login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate the input (basic validation)
    if (empty($username) || empty($password)) {
        $error_message = "Please enter both username and password.";
    } else {
        
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>


    <?php include '../navbar/navtop.php'; ?>


    <div class="login-container">
        <h2>Login</h2>

        <?php if ($error_message) : ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <?php if ($success_message) : ?>
            <div class="success-message"><?php echo $success_message; ?></div>
        <?php endif; ?>

        <form method="post" action="login.php">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
            <p>Don't have an account? <a href="register.php">Register</a></p>
        </form>
    </div>


    <?php include '../navbar/navbottom.php'; ?> <!--adds footer-->


</html>