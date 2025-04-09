<?php
error_reporting(0);
include("connection.php"); // Database connection
session_start();
$user_role = $_SESSION['role'] ?? 'user';
// Validate if admission_id is passed in URL
if (!isset($_GET['admission_id']) || !is_numeric($_GET['admission_id'])) {
    echo "Error: Invalid Admission ID.";
    exit;
}

$admission_id = $_GET['admission_id']; // Get admission_id from URL

// Fetch admission details using the admission_id
$admission_query = "SELECT * FROM admission WHERE admission_id = ?";
$stmt = $conn->prepare($admission_query);
$stmt->bind_param("i", $admission_id);
$stmt->execute();
$admission_result = $stmt->get_result();
$admission = $admission_result->fetch_assoc();

// Check if admission exists
if (!$admission) {
    echo "Error: Admission record not found.";
    exit;
}
if ($admission['status'] === 'approved') {
    if ($user_role === 'admin') {
        echo "<h2 style='color:blue; font-style: italic; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;'>This user is already <strong>approved</strong>. Admin cannot update the details.</h2>";
    } else {
        echo "<h2 style='color:red;font-style: italic; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;'>You can't update now. Your admission is already <strong>approved</strong>.</h2>";
    }
    exit;
} elseif ($admission['status'] === 'rejected') {
    if ($user_role === 'admin') {
        echo "<h2 style='color:blue; font-style: italic; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;'>This user is already <strong>rejected</strong>. Admin cannot update the details.</h2>";
    } else {
        echo "<h2 style='color:red; font-style: italic; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;'>You can't update now. Your admission has been <strong>rejected</strong>.</h2>";
    }
    exit;
}

// Fetch campus, faculty, course, and level names based on the admission data
$campus_query = "SELECT campus_name FROM campus WHERE campus_id = ?";
$stmt = $conn->prepare($campus_query);
$stmt->bind_param("i", $admission['campus_id']);
$stmt->execute();
$stmt->bind_result($campus_name);
$stmt->fetch();
$stmt->close();

$faculty_query = "SELECT faculty_name FROM faculty WHERE faculty_id = ?";
$stmt = $conn->prepare($faculty_query);
$stmt->bind_param("i", $admission['faculty_id']);
$stmt->execute();
$stmt->bind_result($faculty_name);
$stmt->fetch();
$stmt->close();

$course_query = "SELECT course_name FROM course WHERE course_id = ?";
$stmt = $conn->prepare($course_query);
$stmt->bind_param("i", $admission['course_id']);
$stmt->execute();
$stmt->bind_result($course_name);
$stmt->fetch();
$stmt->close();

$level_query = "SELECT level_name FROM level WHERE level_id = ?";
$stmt = $conn->prepare($level_query);
$stmt->bind_param("i", $admission['level_id']);
$stmt->execute();
$stmt->bind_result($level_name);
$stmt->fetch();
$stmt->close();

// Fetch all faculties, courses, and levels
$all_faculties_query = "SELECT faculty_name FROM faculty";
$all_faculties_result = $conn->query($all_faculties_query);
$all_faculties = [];
while ($row = $all_faculties_result->fetch_assoc()) {
    $all_faculties[] = $row['faculty_name'];
}

$all_courses_query = "SELECT course_name FROM course";
$all_courses_result = $conn->query($all_courses_query);
$all_courses = [];
while ($row = $all_courses_result->fetch_assoc()) {
    $all_courses[] = $row['course_name'];
}

$all_levels_query = "SELECT level_name FROM level";
$all_levels_result = $conn->query($all_levels_query);
$all_levels = [];
while ($row = $all_levels_result->fetch_assoc()) {
    $all_levels[] = $row['level_name'];
}

// Handle form submission for updating admission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the input data
    $campus_name = htmlspecialchars(trim($_POST['campus']));
    $faculty_name = htmlspecialchars(trim($_POST['faculty']));
    $course_name = htmlspecialchars(trim($_POST['course']));
    $level_name = htmlspecialchars(trim($_POST['level']));

    // Fetch respective IDs from the database based on their names
    $campus_query = "SELECT campus_id FROM campus WHERE campus_name = ?";
    $stmt = $conn->prepare($campus_query);
    $stmt->bind_param("s", $campus_name);
    $stmt->execute();
    $stmt->bind_result($campus_id);
    $stmt->fetch();
    $stmt->close();

    $faculty_query = "SELECT faculty_id FROM faculty WHERE faculty_name = ?";
    $stmt = $conn->prepare($faculty_query);
    $stmt->bind_param("s", $faculty_name);
    $stmt->execute();
    $stmt->bind_result($faculty_id);
    $stmt->fetch();
    $stmt->close();

    $course_query = "SELECT course_id FROM course WHERE course_name = ?";
    $stmt = $conn->prepare($course_query);
    $stmt->bind_param("s", $course_name);
    $stmt->execute();
    $stmt->bind_result($course_id);
    $stmt->fetch();
    $stmt->close();

    $level_query = "SELECT level_id FROM level WHERE level_name = ?";
    $stmt = $conn->prepare($level_query);
    $stmt->bind_param("s", $level_name);
    $stmt->execute();
    $stmt->bind_result($level_id);
    $stmt->fetch();
    $stmt->close();

    // Now, update the admission record
    $update_query = "UPDATE admission SET campus_id = ?, faculty_id = ?, course_id = ?, level_id = ? WHERE admission_id = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("iiiii", $campus_id, $faculty_id, $course_id, $level_id, $admission_id);

    if ($stmt->execute()) {
        echo "<script>
            alert('Admission Details updated successfully!');
            window.location.href = '" . ($_SESSION['role'] == 'admin' ? 'admin_display.php' : 'display.php') . "?status=updated';
        </script>";
        exit;
    }
    

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Admission</title>
</head>
<body>
<header>
    <h1>Online Student Admission System</h1>
</header>
    <form method="POST" id="updateForm">
    <link rel="stylesheet" href="styles/update.css">
    <h2>Update Admission Details</h2>
        <!-- Campus Selection -->
        <label for="campus">Campus:</label>
        <select id="campus" name="campus" onchange="populateFaculties()">
        <option value="">Choose your campus</option>
    <option value="Mahendra Ratna Campus" <?php echo ($campus_name == "Mahendra Ratna Campus") ? "selected" : ""; ?>>Mahendra Ratna Campus, Ilam</option>
    <option value="Mechi Multiple Campus" <?php echo ($campus_name == "Mechi Multiple Campus") ? "selected" : ""; ?>>Mechi Multiple Campus, Jhapa</option>
    <option value="Kanakai Multiple Campus" <?php echo ($campus_name == "Kanakai Multiple Campus") ? "selected" : ""; ?>>Kanakai Multiple Campus, Jhapa</option>
    <option value="Mahendra Bindeshwari Campus" <?php echo ($campus_name == "Mahendra Bindeshwari Campus") ? "selected" : ""; ?>>Mahendra Bindeshwari Campus, Saptari</option>
    <option value="Dharan Campus" <?php echo ($campus_name == "Dharan Campus") ? "selected" : ""; ?>>Dharan Campus, Dharan</option>
    <option value="Mahendra Morang Adarsha Campus" <?php echo ($campus_name == "Mahendra Morang Adarsha Campus") ? "selected" : ""; ?>>Mahendra Morang Adarsha Campus, Biratnagar</option>

    <!-- Central Region -->
    <option value="Shankhar Dev Campus" <?php echo ($campus_name == "Shankhar Dev Campus") ? "selected" : ""; ?>>Shankhar Dev Campus, Kathmandu</option>
    <option value="Padma Kanya Multiple Campus " <?php echo ($campus_name == "Padma Kanya Multiple Campus") ? "selected" : ""; ?>>Padma Kanya Multiple Campus, Kathmandu</option>
    <option value="Ratna Rajya Campus" <?php echo ($campus_name == "Ratna Rajya Campus") ? "selected" : ""; ?>>Ratna Rajya Campus, Kathmandu</option>
    <option value="Amrit Science Campus" <?php echo ($campus_name == "Amrit Science Campus") ? "selected" : ""; ?>>Amrit Science Campus, Kathmandu</option>
    <option value="Public Youth Campus" <?php echo ($campus_name == "Public Youth Campus") ? "selected" : ""; ?>>Public Youth Campus, Kathmandu</option>
    <option value="Saraswati Multiple Campus" <?php echo ($campus_name == "Saraswati Multiple Campus") ? "selected" : ""; ?>>Saraswati Multiple Campus, Kathmandu</option>
    <option value="Baneshwor Multiple Campus" <?php echo ($campus_name == "Baneshwor Multiple Campus") ? "selected" : ""; ?>>Baneshwor Multiple Campus, Kathmandu</option>
    <option value="Nepal Law Campus" <?php echo ($campus_name == "Nepal Law Campus") ? "selected" : ""; ?>>Nepal Law Campus, Kathmandu</option>
    <option value="Bhaktapur Campus" <?php echo ($campus_name == "Bhaktapur Campus") ? "selected" : ""; ?>>Bhaktapur Campus, Bhaktapur</option>
    <option value="Patan Multiple Campus" <?php echo ($campus_name == "Patan Multiple Campus") ? "selected" : ""; ?>>Patan Multiple Campus, Lalitpur</option>
    <option value="Pulchowk Campus" <?php echo ($campus_name == "Pulchowk Campus") ? "selected" : ""; ?>>Pulchowk Campus, Lalitpur</option>
    <option value="Thapathali Campus" <?php echo ($campus_name == "Thapathali Campus") ? "selected" : ""; ?>>Thapathali Campus, Kathmandu</option>
    <option value="Janamaitri Multiple Campus" <?php echo ($campus_name == "Janamaitri Multiple Campus") ? "selected" : ""; ?>>Janamaitri Multiple Campus, Kathmandu</option>
    <option value="Makwanpur Multiple Campus" <?php echo ($campus_name == "Makwanpur Multiple Campus") ? "selected" : ""; ?>>Makwanpur Multiple Campus, Hetauda</option>
    <option value="Mahendra Buddhikharma Campus" <?php echo ($campus_name == "Mahendra Buddhikharma Campus") ? "selected" : ""; ?>>Mahendra Buddhikharma Campus, Dhading</option>

    <!-- Western Region -->
    <option value="Prithvi Narayan Campus" <?php echo ($campus_name == "Prithvi Narayan Campus") ? "selected" : ""; ?>>Prithvi Narayan Campus, Pokhara</option>
    <option value="Tansen Multiple Campus" <?php echo ($campus_name == "Tansen Multiple Campus") ? "selected" : ""; ?>>Tansen Multiple Campus, Tansen</option>
    <option value="Padmodaya Campus" <?php echo ($campus_name == "Padmodaya Campus") ? "selected" : ""; ?>>Padmodaya Campus, Palpa</option>
    <option value="Butwal Multiple Campus" <?php echo ($campus_name == "Butwal Multiple Campus") ? "selected" : ""; ?>>Butwal Multiple Campus, Butwal</option>

    <!-- Mid-Western Region -->
    <option value="Mahendra Multiple Campus" <?php echo ($campus_name == "Mahendra Multiple Campus") ? "selected" : ""; ?>>Mahendra Multiple Campus, Nepalgunj</option>
        
        </select>
        <span id="campusErr"></span>
        <label for="faculty">Faculty:</label>
<select id="faculty" name="faculty" onchange="populateCourses()" disabled >
    <?php foreach ($all_faculties as $faculty): ?>
        <option value="<?php echo htmlspecialchars($faculty); ?>" <?php echo ($faculty_name == $faculty) ? "selected" : ""; ?>>
            <?php echo htmlspecialchars($faculty); ?>
        </option>
    <?php endforeach; ?>
</select>
<span id="facultyErr"></span>
<label for="course">Course:</label>
<select id="course" name="course" onchange="populateLevels()" disabled>
    <?php foreach ($all_courses as $course): ?>
        <option value="<?php echo htmlspecialchars($course); ?>" <?php echo ($course_name == $course) ? "selected" : ""; ?>>
            <?php echo htmlspecialchars($course); ?>
        </option>
    <?php endforeach; ?>
</select>
<span id="courseErr"></span>
<label for="level">Level:</label>
<select id="level" name="level" disabled>
    <?php foreach ($all_levels as $level): ?>
        <option value="<?php echo htmlspecialchars($level); ?>" <?php echo ($level_name == $level) ? "selected" : ""; ?>>
            <?php echo htmlspecialchars($level); ?>
        </option>
    <?php endforeach; ?>
</select>
<span id="levelErr"></span>
        <input type="submit" value="Update">
    </form>
    <script src = "script/myupdate.js"></script>
    <script src = "script/myupdate2.js"></script>
</body>
</html>
