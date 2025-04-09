<?php
include("connection.php");

// Start session
session_start();

// Initialize error message
$loginError = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $middle_name = mysqli_real_escape_string($conn, $_POST['middle_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $blood=mysqli_real_escape_string($conn, $_POST['blood_group']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $campus = mysqli_real_escape_string($conn, $_POST['campus']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);
    $level = mysqli_real_escape_string($conn, $_POST['level']); // New input for level
    $guardian_name = mysqli_real_escape_string($conn, $_POST['guardian_name']);
    $guardian_occupation = mysqli_real_escape_string($conn, $_POST['guardian_occupation']);
    $guardian_phone = mysqli_real_escape_string($conn, $_POST['guardian_phone']);
    $faculty = mysqli_real_escape_string($conn, $_POST['department']); 
    $passcode = mysqli_real_escape_string($conn, $_POST['passcode']);// New input for faculty

    // File uploads
    $uploads = [
        'resultCertificate' => $_FILES['resultCertificate']['name'],
        'provisionalCertificate' => $_FILES['provisionalCertificate']['name'],
        'migrationCertificate' => $_FILES['migrationCertificate']['name'],
        'characterCertificate' => $_FILES['characterCertificate']['name']
    ];
    $photo_name = $_FILES['photo']['name'];

    // Process file uploads
    $uploaded_files = [];
    foreach ($uploads as $key => $file) {
        $target_dir = "uploads/certificates/";
        $target_file = $target_dir . basename($file);

        // Attempt to move the uploaded file
        if (!move_uploaded_file($_FILES[$key]['tmp_name'], $target_file)) {
            echo "Error uploading certificate: " . $file;
            exit;
        }
        $uploaded_files[$key] = $file;
    }

    // Process photo upload
    $photo_dir = "uploads/photos/";
    $photo_file = $photo_dir . basename($photo_name);

    if (!move_uploaded_file($_FILES['photo']['tmp_name'], $photo_file)) {
        echo "Error uploading photo: " . $photo_name;
        exit;
    }

    // Start transaction
    mysqli_begin_transaction($conn);
    try {
        // Fetch campus, course, level, and faculty IDs
        $campus_id = getIdFromName($conn, 'campus', 'campus_name', $campus);
        $course_id = getIdFromName($conn, 'course', 'course_name', $course);
        $level_id = getIdFromName($conn, 'level', 'level_name', $level);
        $faculty_id = getIdFromName($conn, 'faculty', 'faculty_name', $faculty); // Fetch faculty_id

        // Fetch email from login table
        if (isset($_SESSION['login_id'])) {
            $login_id = $_SESSION['login_id'];
            $query = "SELECT email FROM login WHERE login_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $login_id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result && $row = $result->fetch_assoc()) {
                $email = $row['email'];
            } else {
                throw new Exception("Error fetching email from login table");
            }
        } else {
            throw new Exception("User is not logged in");
        }

        // Insert user information into users table
        $user_query = "INSERT INTO users (first_name, middle_name, last_name, phone_no, dob, blood_group, gender, address, email) 
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)";
        $stmt = $conn->prepare($user_query);
        $stmt->bind_param("sssssssss", $first_name, $middle_name, $last_name, $phone, $dob, $blood, $gender, $address, $email);
        $stmt->execute();
        $user_id = $stmt->insert_id; // Get the user_id after inserting into users table

        // Insert photo into photo table with user_id
        $photo_query = "INSERT INTO photo (photo_name, user_id) VALUES (?, ?)";
        $stmt = $conn->prepare($photo_query);
        $stmt->bind_param("si", $photo_name, $user_id); // Bind both photo_name and user_id
        $stmt->execute();
        $photo_id = $stmt->insert_id; // Get the photo_id

        // Insert admission info into admission table (including faculty_id)
        $admission_query = "INSERT INTO admission (status, campus_id, course_id, level_id, faculty_id, user_id,passcode) 
                            VALUES ('pending', ?, ?, ?, ?, ?,?)";
        $stmt = $conn->prepare($admission_query);
        $stmt->bind_param("iiiiii", $campus_id, $course_id, $level_id, $faculty_id, $user_id,$passcode); // Bind all 5 parameters
        $stmt->execute();

        // Insert guardian information
        $guardian_query = "INSERT INTO guardian (user_id, guardian_name, guardian_occupation, guardian_phone) 
                           VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($guardian_query);
        $stmt->bind_param("isss", $user_id, $guardian_name, $guardian_occupation, $guardian_phone);
        $stmt->execute();

        // Insert certificates info into certificate table
        foreach ($uploaded_files as $type => $file_name) {
            $certificate_query = "INSERT INTO certificate (user_id, certificate_name, certificate_type) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($certificate_query);
            $stmt->bind_param("iss", $user_id, $file_name, $type);
            $stmt->execute();
        }

        // Commit transaction
        mysqli_commit($conn);

        // Redirect to display page
        echo "<script>
        alert('You have registered successfully! Redirecting to the payment dashboard...');
        window.location.href = 'khalti-payment/checkout.php';
    </script>";
        exit;
    } catch (Exception $e) {
        // Rollback transaction on error
        mysqli_rollback($conn);
        echo "Transaction failed: " . $e->getMessage();
    }
}

// Helper function to fetch ID by name
function getIdFromName($conn, $table, $nameColumn, $nameValue) {
    $query = "SELECT * FROM $table WHERE $nameColumn = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $nameValue);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        return $row[$table . '_id'];
    } else {
        throw new Exception("Error finding $nameValue in $table");
    }
}

// Close the database connection
mysqli_close($conn);
?>
