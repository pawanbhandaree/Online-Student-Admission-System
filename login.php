<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include("connection.php"); // Ensure this file contains the correct database connection

// Initialize error message
$loginError = '';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Prepare the query to check login credentials (without password)
    $query = "SELECT * FROM login WHERE email = ?";
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        die("SQL Error: " . $conn->error); // Debugging error
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        // Verify the hashed password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['login_id'] = $user['login_id']; 
            $_SESSION['role'] = $user['role'];
            $_SESSION['email'] = $user['email'];

            // Check if the email exists in the users table
            $checkUserQuery = "SELECT * FROM users WHERE email = ?";
            $checkUserStmt = $conn->prepare($checkUserQuery);

            if (!$checkUserStmt) {
                die("SQL Error: " . $conn->error); // Debugging error
            }

            $checkUserStmt->bind_param("s", $email);
            $checkUserStmt->execute();
            $userResult = $checkUserStmt->get_result();

            if ($userResult->num_rows === 1) {
                header("Location: olduserdashboard.php");
                exit();
            } else {
                if ($user['role'] === 'admin') {
                    header("Location: admin_dashboard.php");
                    exit();
                } else {
                    header("Location: user_dashboard.php");
                    exit();
                }
            }
        } else {
            $loginError = "Invalid email or password.";
        }
    } else {
        $loginError = "Invalid email or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
     <link rel="stylesheet" href="styles/login.css">
</head>
<body>
 <nav>
    <h1>Online Student Admission System</h1>
</nav>
    <div class="form-container">
        <form id="loginForm" method="POST" action="">
            <h2>Admin/User Login Dashboard</h2><br>
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
            <button type="submit" name="login">Login</button>
            <br><br>
            <a href="newaccount.php">Create an Account</a>
            <br><br>
            <!-- Display error if login fails -->
            <?php if (!empty($loginError)): ?>
                <span class="error"><?php echo $loginError; ?></span>
            <?php endif; ?>
        </form>
    </div>


    <script src="script/login.js"></script> 
</body>
</html>