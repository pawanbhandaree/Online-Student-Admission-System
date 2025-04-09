<?php
session_start();
if (!isset($_SESSION['login_id']) || !isset($_SESSION['email'])) {
    header('Location: logout.php');
    exit();
}

include("connection.php"); // Ensure this file connects to your database

$login_id = $_SESSION['login_id'];
$email = $_SESSION['email'];

// Fetch user details from the database
$query = "SELECT * FROM login WHERE login_id = ?";
$stmt = $conn->prepare($query);
if (!$stmt) {
    die("SQL Error: " . $conn->error);
}
$stmt->bind_param("i", $login_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc(); // Fetch user details
} else {
    echo "User not found!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="styles/user_dashboard.css">
</head>
<body>
    <!-- Header Section -->
    <div class="header">
    <div class="title">Online Student Admission System</div>
    <div id="button">
        <a href="logout.php" class="btn">Logout</a>
        <a href="/Form/admissionform.php" class="btn">Enroll</a>
    </div>
</div>
 
<?php
// Include database connection
include('connection.php');

// Fetch only active notices
$query = "SELECT * FROM notices WHERE is_active = 1 ORDER BY created_at DESC LIMIT 1";
$result = $conn->query($query);
$notice = $result->fetch_assoc();

if ($notice) {
    echo "<div class='notice'>";
    echo "<marquee style='background-color: #f0f0f0; font-style: italic; padding: 10px;'>";
    echo "<strong>Notice From Admin:</strong> " . htmlspecialchars($notice['notice_content']);
    echo "</marquee>";
    echo "</div>";
}
?>

    <!-- Dashboard Section -->
    <div class="container">
        <h2> Welcome to Your Control Panel</h2>
        <div class="profile-item">
            <strong>User's Login ID:</strong> <span><?php echo htmlspecialchars($user['login_id'], ENT_QUOTES, 'UTF-8'); ?></span>
        </div>
        <div class="profile-item">
            <strong>Username:</strong> <span><?php echo htmlspecialchars($user['username'] ?? 'Not Provided', ENT_QUOTES, 'UTF-8'); ?></span>
        </div>
        <div class="profile-item">
            <strong>Email:</strong> <span><?php echo htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8'); ?></span>
        </div>
        <div class="profile-item">
            <strong>Role:</strong> <span><?php echo htmlspecialchars($user['role'], ENT_QUOTES, 'UTF-8'); ?></span>
        </div>
       
    </div>

    <!-- Footer Section -->
    <footer class="footer">
        © 2025 Online Student Admission System
    </footer>
</body>
</html>
