<?php
include("connection.php");

// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['login_id'])) {
    header("Location: logout.php");
    exit;
}

$login_id = $_SESSION['login_id'];

// Ensure admission_id is provided
if (!isset($_GET['admission_id'])) {
    echo "Error: Admission ID is required.";
    exit;
}

$admission_id = intval($_GET['admission_id']); // Sanitize input

// Fetch user_id from admission table using admission_id (not login_id)
$query = "SELECT user_id FROM admission WHERE admission_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $admission_id); // Use admission_id, not login_id
$stmt->execute();
$result = $stmt->get_result();

if ($result && $row = $result->fetch_assoc()) {
    $user_id = $row['user_id'];
} else {
    echo "Error: No user found for the given admission ID.";
    exit;
}

// Fetch admission details and check if status is approved
$admission_query = "
    SELECT users.*, 
           admission.campus_id, admission.faculty_id, admission.course_id, admission.level_id, admission.status
    FROM users
    INNER JOIN admission ON users.user_id = admission.user_id
    WHERE users.user_id = ? AND admission.admission_id = ?";
$stmt = $conn->prepare($admission_query);
$stmt->bind_param("ii", $user_id, $admission_id);
$stmt->execute();
$admission_result = $stmt->get_result();

if ($admission_result->num_rows > 0) {
    $user = $admission_result->fetch_assoc();

    if ($user['status'] === 'rejected') {
        echo "<h3 style='color: red; font-style: italic; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;'>
                The admission request has been <strong>rejected</strong>. No further updates are allowed.
              </h3>";
        exit;
    }
    
    if ($user['status'] !== 'approved') {
        echo "<h3 style='color: blue; font-style: italic; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;'>
                The admission request has not been approved.
              </h3>";
        exit;
    }
    
    

    $campus_name = getEntityName($conn, 'campus', 'campus_name', $user['campus_id']);
    $department_name = getEntityName($conn, 'faculty', 'faculty_name', $user['faculty_id']);
    $course_name = getEntityName($conn, 'course', 'course_name', $user['course_id']);
    $level_name = getEntityName($conn, 'level', 'level_name', $user['level_id']);
    $photo_link = getPhotoLink($conn, $user['user_id']);

    ob_start(); // Start output buffering
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admission Report</title>
       <link rel ="stylesheet" href="styles/user_report.css">
    </head>
    <body>
    <header>
<a href="display.php" class="back-button">&larr; Back to Display</a>
    </header>
        <div class="card">
            <img src="<?php echo $photo_link; ?>" alt="User Photo">
            <h2>Admission Report</h2>
            <p><strong>Name:</strong> <?php echo "{$user['first_name']} {$user['middle_name']} {$user['last_name']}"; ?></p>
            <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
            <p><strong>Phone:</strong> <?php echo $user['phone_no']; ?></p>
            <p><strong>Address:</strong> <?php echo $user['address']; ?></p>
            <p><strong>Campus:</strong> <?php echo $campus_name; ?></p>
            <p><strong>Faculty:</strong> <?php echo $department_name; ?></p>
            <p><strong>Course:</strong> <?php echo $course_name; ?></p>
            <p><strong>Level:</strong> <?php echo $level_name; ?></p>
            <div class="print-button">
                <a href="#" onclick="window.print()">Download as PDF</a>
            </div>
        </div>
    </body>
    </html>
    <?php
    $content = ob_get_clean();
    echo $content;

} else {
    echo "<h3>No admission record found for this ID.</h3>";
}

function getEntityName($conn, $table, $column, $id) {
    if (!$id) return "Unknown $table";
    $query = "SELECT $column FROM $table WHERE {$table}_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc()[$column] ?? "Unknown $table";
}

function getPhotoLink($conn, $user_id) {
    $query = "SELECT photo_name FROM photo WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $photo_result = $stmt->get_result();
    $photo_row = $photo_result->fetch_assoc();
    return isset($photo_row['photo_name']) ? "uploads/photos/" . $photo_row['photo_name'] : "uploads/photos/default.jpg";
}

mysqli_close($conn);
?>