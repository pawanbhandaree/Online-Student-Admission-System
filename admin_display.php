<?php
session_start();
if ($_SESSION['role'] !== 'admin') {
    header('Location: logout.php'); // Redirect to login if not admin
    exit();
}
?>

<html>
<head>
    <title>Display</title>
    <link rel="stylesheet" href="styles/admin_displayy.css">
</head>
<body>
    <nav>
        <h1><center>Online Student Admission System</center></h1>
        <input type="text" id="searchInput" placeholder="Search student details..." onkeyup="searchByName()">
        <input type="text" id="searchInput1" placeholder="Search by Course..." onkeyup="searchByCourse()">
        <input type="text" id="searchInput2" placeholder="Search by Campus..." onkeyup="searchByCampus()">
        <a href="report.php" class="button report-link">View Report</a>
        <a href="userdetails.php" class="button report-linkk">Delete Records</a>
        <a href="logout.php" class="button logout-button">Logout</a>
    </nav>

<?php
include("connection.php");

// Fetch all user records along with admission table data, and related information
$query = "
    SELECT u.user_id, u.first_name, u.middle_name, u.last_name, u.phone_no, u.email, u.address, u.blood_group,
           a.admission_id, a.campus_id, a.faculty_id, a.course_id, a.level_id, a.status, 
           COALESCE(p.amount, 0) AS amount
    FROM users u
    LEFT JOIN admission a ON u.user_id = a.user_id
    LEFT JOIN payments p ON a.admission_id = p.admission_id
";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

if ($total > 0) {
    echo '<h2><center><mark>ADMIN VIEW PANEL-Users Registered Details</mark></center></h2>';

    echo '<div class="container"><center>
    <table border="3" cellspacing="5" id="studentTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Fullname</th>
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
            <th>Amount Paid</th>
            <th>Operations</th>
        </tr>
    </thead>
    <tbody>';

    while ($result = mysqli_fetch_assoc($data)) {
        $fullname = $result['first_name'] . ' ' . ($result['middle_name'] ? $result['middle_name'] . ' ' : '') . $result['last_name'];

        // Fetch guardian details using user_id
        $guardian_query = "SELECT guardian_name, guardian_phone FROM guardian WHERE user_id = ?";
        $stmt = $conn->prepare($guardian_query);
        $stmt->bind_param("i", $result['user_id']);
        $stmt->execute();
        $guardian_result = $stmt->get_result();
        $guardian = $guardian_result->fetch_assoc();
        $guardian_name = isset($guardian['guardian_name']) ? $guardian['guardian_name'] : "N/A";
        $guardian_phone = isset($guardian['guardian_phone']) ? $guardian['guardian_phone'] : "N/A";

        // Fetch certificates (exactly 4 certificates)
        $certificate_query = "SELECT certificate_type, certificate_name FROM certificate WHERE user_id = ?";
        $stmt = $conn->prepare($certificate_query);
        $stmt->bind_param("i", $result['user_id']);
        $stmt->execute();
        $certificate_result = $stmt->get_result();

        // Store certificates in an array, limiting to 4 certificates
        $certificates = [];
        while ($certificate = $certificate_result->fetch_assoc()) {
            $certificates[] = "<a href='uploads/certificates/" . $certificate['certificate_name'] . "' target='_blank'>" . ucfirst($certificate['certificate_type']) . "</a>";
        }

        // Fill any missing certificate columns with "No Certificate"
        while (count($certificates) < 4) {
            $certificates[] = "No Certificate";
        }

        // Fetch campus, department, course, and level names
        $campus_name = getEntityName($conn, 'campus', 'campus_name', $result['campus_id']);
        $department_name = getEntityName($conn, 'faculty', 'faculty_name', $result['faculty_id']);
        $course_name = getEntityName($conn, 'course', 'course_name', $result['course_id']);
        $level_name = getEntityName($conn, 'level', 'level_name', $result['level_id']);

        // Fetch photo link
        $photo_link = getPhotoLink($conn, $result['user_id']);
       
        // Display the row with 4 fixed certificate columns
        echo "<tr>
                <td>{$result['user_id']}</td>
                <td>{$fullname}</td>
                <td>{$result['phone_no']}</td>
                <td>{$result['email']}</td>
                <td>{$result['address']}</td>
                <td>{$result['blood_group']}</td>
                <td>{$campus_name}</td>
                <td>{$department_name}</td>
                <td>{$course_name}</td>
                <td>{$level_name}</td>
                <td>{$guardian_name}</td>
                <td>{$guardian_phone}</td>";

        // Display certificates (exactly 4 columns)
        foreach ($certificates as $certificate) {
            echo "<td>{$certificate}</td>";
        }

        echo "<td><img src='$photo_link' alt='Photo' width='100' height='100'></td>
              <td>{$result['status']}</td>
            <td>Rs. " . number_format($result['amount'] / 100, 2) . "</td>

              <td>
                           <a href='approve.php?admission_id={$result['admission_id']}'><button class='approve'>Approve</button></a>
                    <a href='myupdate.php?admission_id={$result['admission_id']}' ><button class='update'>Update</button></a>
                  <a href='reject.php?admission_id={$result['admission_id']}' ><button class='delete'>Reject</button></a>
              </td>
            </tr>";
    }

    echo '</tbody></table></center>';
} else {
    echo "No records found.";
}
?>
<script>

</script>


<footer class="footer">
    &copy; 2025 Online Student Admission System
</footer>
<script src="script/admin__display.js"></script>
</body>
</html>

<?php
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
    $query = "SELECT photo_name FROM photo WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $photo_result = $stmt->get_result();
    $photo_row = $photo_result->fetch_assoc();
    return isset($photo_row['photo_name']) ? "uploads/photos/" . $photo_row['photo_name'] : "uploads/photos/default.jpg";
}
?>