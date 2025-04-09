<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="styles/newaccount.css">
</head>
<body>
<nav>
    <h1>Online Student Admission System</h1>
</nav>
    <div class="form-container">
        <form id="registerForm" method="POST" action="">
            <h2>Create User Account</h2><br>
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username"><br><br>
                <span id="usernameError" class="error"></span>
            </div>
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email"><br><br>
                <span id="emailError" class="error"></span>
            </div>
            <div class="input-group">
        <label for="password">Password:</label>
        <div class="password-container">
            <input type="password" id="password" name="password">
            <span class="eye-icon" id="eyeIcon" onclick="togglePassword()">👁️‍🗨️</span>
        </div>
        <span id="passwordError" class="error"></span>
    </div>
<br>
            <button type="submit" name="register">Create</button>
            <br><br>
            
        </form>
    </div>

    <script src="script/newaccount.js"></script>
</body>
</html>


<?php
include("connection.php"); // Include your database connection

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['register'])) {
    $username = htmlspecialchars(trim($_POST['username'])); // Sanitize input
    $email = htmlspecialchars(trim($_POST['email']));
    $password = $_POST['password']; // Get raw password input

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    // Check if the email or username already exists
    $check_query = "SELECT login_id FROM login WHERE email = ? OR username = ?";
    $check_stmt = $conn->prepare($check_query);
    
    if (!$check_stmt) {
        die("SQL Error: " . $conn->error);
    }

    $check_stmt->bind_param("ss", $email, $username);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        die("Error: Username or Email already exists.");
    }

    $check_stmt->close();

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert user into the database
    $query = "INSERT INTO login (username, email, password, role) VALUES (?, ?, ?, 'user')";
    $stmt = $conn->prepare($query);
    
    if (!$stmt) {
        die("SQL Error: " . $conn->error);
    }

    $stmt->bind_param("sss", $username, $email, $hashed_password);

    if ($stmt->execute()) {
        header('Location: login.php'); // Redirect to login page
        exit();
    } else {
        echo "Error: Could not create account.";
    }

    $stmt->close();
}
?>
