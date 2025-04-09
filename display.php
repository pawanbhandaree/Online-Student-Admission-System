<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
    <link rel="stylesheet" href="styles/displays.css">
</head>
<body>
<nav>
    <h1>Online Student Admission System</h1>
    <a href="logout.php" class="button logout-btn">Logout</a>
</nav>

<?php
include("connection.php");
error_reporting(0);
// Start session
session_start();
$user_id = $_SESSION['user_id'];  
// Check if user is logged in
if (!isset($_SESSION['login_id'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit;
}

// Fetch the user's email using the login_id from the session
$login_id = $_SESSION['login_id'];
$query = "SELECT email FROM login WHERE login_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $login_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $row = $result->fetch_assoc()) {
    $email = $row['email']; // Get the email
} else {
    echo "Error fetching email from login table.";
    exit;
}

// Fetch all user records associated with the email, including admission table data and payment details
$user_query = "
    SELECT users.*, 
           admission.admission_id, admission.campus_id, admission.faculty_id, admission.course_id, admission.level_id, admission.status,
           payments.amount
    FROM users
    LEFT JOIN admission ON users.user_id = admission.user_id
    LEFT JOIN payments ON admission.admission_id = payments.admission_id
    WHERE users.email = ?
    ORDER BY users.user_id DESC";
$stmt = $conn->prepare($user_query);
$stmt->bind_param("s", $email);
$stmt->execute();
$user_result = $stmt->get_result();

if ($user_result && $user_result->num_rows > 0) {
    echo '<h2><center><mark>USER VIEW PANEL-Your Registered Details </mark></center></h2>'; 

    // Display user details and related information in a table
    echo "<table border='1' cellpadding='10' id ='student_table'>";
    echo "<tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>Blood Group</th>
            <th>Campus</th>
            <th>Department</th>
            <th>Course</th>
            <th>Level</th>
            <th>Guardian Name</th>
            <th>Guardian Phone</th>
            <th>Certificate 1</th>
            <th>Certificate 2</th>
            <th>Certificate 3</th>
            <th>Certificate 4</th>
            <th>Photo</th>
            <th>Status</th>
            <th>Amount</th> <!-- Added column for Amount -->
            <th>Operations</th>
          </tr>";

    while ($user = $user_result->fetch_assoc()) {
        // Fetch guardian details using user_id
        $guardian_query = "SELECT * FROM guardian WHERE user_id = ?";
        $stmt = $conn->prepare($guardian_query);
        $stmt->bind_param("i", $user['user_id']);
        $stmt->execute();
        $guardian_result = $stmt->get_result();
        $guardian = $guardian_result->fetch_assoc();

        // Default values for guardian details
        $guardian_name = isset($guardian['guardian_name']) ? $guardian['guardian_name'] : "N/A";
        $guardian_phone = isset($guardian['guardian_phone']) ? $guardian['guardian_phone'] : "N/A";

        // Fetch certificates
        $certificate_query = "SELECT * FROM certificate WHERE user_id = ?";
        $stmt = $conn->prepare($certificate_query);
        $stmt->bind_param("i", $user['user_id']);
        $stmt->execute();
        $certificate_result = $stmt->get_result();

        // Initialize an array to store certificates for each column
        $certificates = [null, null, null, null];

        $index = 0;
        while ($certificate = $certificate_result->fetch_assoc()) {
            if ($index < 4) {
                $certificates[$index] = "<a href='uploads/certificates/" . $certificate['certificate_name'] . "' target='_blank'>" . ucfirst($certificate['certificate_type']) . "</a>";
                $index++;
            }
        }

        // Fetch campus, department, course, and level names
        $campus_name = getEntityName($conn, 'campus', 'campus_name', $user['campus_id']);
        $department_name = getEntityName($conn, 'faculty', 'faculty_name', $user['faculty_id']);
        $course_name = getEntityName($conn, 'course', 'course_name', $user['course_id']);
        $level_name = getEntityName($conn, 'level', 'level_name', $user['level_id']);

        // Fetch photo using user_id (photo_id exists in the photo table)
        $photo_link = getPhotoLink($conn, $user['user_id']);

        // Get payment amount
        $amount = isset($user['amount']) ? number_format($user['amount']/100, 2) : "N/A"; // Convert paisa to rupees if exists

        // Display the user and related details along with amount
        echo "<tr>
                <td>{$user['user_id']}</td>
                <td>{$user['first_name']} {$user['middle_name']} {$user['last_name']}</td>
                <td>{$user['phone_no']}</td>
                <td>{$user['email']}</td>
                <td>{$user['address']}</td>
                 <td>{$user['blood_group']}</td>
                <td>{$campus_name}</td>
                <td>{$department_name}</td>
                <td>{$course_name}</td>
                <td>{$level_name}</td>
                <td>{$guardian_name}</td>
                <td>{$guardian_phone}</td>
                <td>{$certificates[0]}</td>
                <td>{$certificates[1]}</td>
                <td>{$certificates[2]}</td>
                <td>{$certificates[3]}</td>
                <td><img src='$photo_link' alt='Photo' width='100' height='100'></td>
                <td>" . ($user['status'] ?? "Unknown") . "</td>
                <td>{$amount}</td> <!-- Displaying amount -->
                <td><a href='myupdate.php?admission_id={$user['admission_id']}'><button class='uppdate'>Update</button></a>
                <a href='user_report.php?admission_id={$user['admission_id']}'><button class='update'>View Report</button></a></td>
            

              </tr>";
    }

    echo "</table>";
} else {
    echo "<div style='text-align: center; font-size: 14px; font-style:italic; margin-top: 5px;'><h3>No records found for this email.</h3></div>";
    
    // Alert the user
    echo "<script>alert('No records found for this email.');</script>";
}

// Helper functions
function getEntityName($conn, $table, $column, $id) {
    $query = "SELECT $column FROM $table WHERE {$table}_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc()[$column] ?? "Unknown $table";
}

function getPhotoLink($conn, $user_id) {
    // Fetch the photo link using user_id (photo_id is in the photo table)
    $query = "SELECT photo_name FROM photo WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $photo_result = $stmt->get_result();
    $photo_row = $photo_result->fetch_assoc();
    return isset($photo_row['photo_name']) ? "uploads/photos/" . $photo_row['photo_name'] : "uploads/photos/default.jpg";
}

// Close the database connection
mysqli_close($conn);
?>
<footer class="footer">
    &copy; 2025 Online Student Admission System
</footer>
</body>
</html>
