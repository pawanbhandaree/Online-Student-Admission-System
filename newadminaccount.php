<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="styles/newaccount1.css">
</head>
<body>
<nav>
    <h1>Online Student Admission System</h1>
</nav>
    <div class="form-container">
        <form id="registerForm" method="POST" action="">
            <h2>Create Account</h2><br>
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <div class="password-container">
                    <input type="password" id="password" name="password" required>
                    <span class="eye-icon" id="eyeIcon" onclick="togglePassword()">👁️</span>
                </div>
            </div>
            <div class="input-group">
                <label for="role">Role:</label>
                <select id="role" name="role" required>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select><br><br>
            </div>
            <button type="submit" name="register">Create</button>
            <br><br>
        </form>
    </div>

    <script>
        function togglePassword() {
            let passwordField = document.getElementById("password");
            passwordField.type = passwordField.type === "password" ? "text" : "password";
        }
    </script>
</body>
</html>

<?php
include("connection.php"); // Include your database connection

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['register'])) {
    $email = htmlspecialchars(trim($_POST['email']));
    $password = $_POST['password'];
    $role = $_POST['role'];

    if (!in_array($role, ['user', 'admin'])) {
        die("Invalid role selected.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    $check_query = "SELECT login_id FROM login WHERE email = ?";
    $check_stmt = $conn->prepare($check_query);
    if (!$check_stmt) {
        die("SQL Error: " . $conn->error);
    }
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $check_stmt->store_result();
    
    if ($check_stmt->num_rows > 0) {
        die("Error: Email already exists.");
    }
    $check_stmt->close();

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $query = "INSERT INTO login (email, password, role) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die("SQL Error: " . $conn->error);
    }
    $stmt->bind_param("sss", $email, $hashed_password, $role);

    if ($stmt->execute()) {
        header('Location: login.php');
        exit();
    } else {
        echo "Error: Could not create account.";
    }
    $stmt->close();
}
?>
