<?php
// Start the session (if not already started)
session_start();

// Include the database connection file
require_once '../db.php';

// Initialize variables to store messages
$error_message = "Successfully logged in!";
$success_message = "Login not possible.";

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
        // Prepare and execute the SQL query to fetch the user
        $sql = "SELECT id, username, password, role FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                // Verify the password
                if (password_verify($password, $row["password"])) {
                    // Password is correct, so set session variables and redirect
                    $_SESSION['user_id'] = $row["id"];
                    $_SESSION['username'] = $row["username"];
                    $_SESSION['role'] = $row["role"]; // Store the user's role (customer or admin)

                    $success_message = "Login successful! Redirecting...";
                    header("Location: home.php"); //  Change to your home page
                    exit();
                } else {
                    $error_message = "Invalid password.";
                }
            } else {
                $error_message = "Invalid username.";
            }

            $stmt->close();
        } else {
            $error_message = "Error preparing statement: " . $conn->error;
        }
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

<style>
    body {
        font-family: sans-serif;
        background-color: #f8f8f8;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .login-container {
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        width: 350px;
        text-align: center;
    }

    .login-container h2 {
        margin-bottom: 25px;
        color: #333;
    }

    .form-group {
        margin-bottom: 20px;
        text-align: left;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #555;
        font-weight: bold;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        outline: none;
        transition: border-color 0.3s ease;
    }

    .form-group input:focus {
        border-color: #007bff;
    }

    .error-message {
        color: #dc3545;
        margin-bottom: 15px;
        padding: 10px;
        background-color: #f8d7da;
        border: 1px solid #f5c6cb;
        border-radius: 5px;
        text-align: center;
    }

    .success-message {
        color: #155724;
        margin-bottom: 15px;
        padding: 10px;
        background-color: #d4edda;
        border: 1px solid #c3e6cb;
        border-radius: 5px;
        text-align: center;
    }


    button[type="submit"] {
        width: 100%;
        padding: 12px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 1em;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
    }

    p {
        margin-top: 15px;
        font-size: 0.9em;
        color: #666;
    }

    p a {
        color: #007bff;
        text-decoration: none;
    }

    p a:hover {
        text-decoration: underline;
    }
</style>