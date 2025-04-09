<?php
include("connection.php");

// Get user ID from the URL
if (isset($_GET['user_id'])) {
    $user_id = (int)$_GET['user_id']; 
} else {
    header("Location: error.php"); 
    exit(); 
}

// Get form data (with basic sanitization)
$firstName = mysqli_real_escape_string($conn, $_POST['first_name']);
$middleName = mysqli_real_escape_string($conn, $_POST['middle_name']);
$lastName = mysqli_real_escape_string($conn, $_POST['last_name']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$dob = $_POST['dob']; // Assuming date format is already valid
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$campus = mysqli_real_escape_string($conn, $_POST['campus']); 
$faculty = mysqli_real_escape_string($conn, $_POST['faculty']);
$course = mysqli_real_escape_string($conn, $_POST['course']);
$level = mysqli_real_escape_string($conn, $_POST['level']);
$guardianName = mysqli_real_escape_string($conn, $_POST['guardian_name']);
$guardianOccupation = mysqli_real_escape_string($conn, $_POST['guardian_occupation']);
$guardianPhone = mysqli_real_escape_string($conn, $_POST['guardian_phone']);
$passcode = mysqli_real_escape_string($conn, $_POST['passcode']);

// Update user details in 'users' table
$updateQuery = "UPDATE users SET 
    first_name = ?, 
    middle_name = ?, 
    last_name = ?, 
    phone_no = ?, 
    dob = ?, 
    gender = ?, 
    address = ? 
    WHERE user_id = ?";

$stmt = mysqli_prepare($conn, $updateQuery);
mysqli_stmt_bind_param($stmt, "sssssssi", $firstName, $middleName, $lastName, $phone, $dob, $gender, $address, $user_id);
mysqli_stmt_execute($stmt);

// Update admission details in 'admission' table
$updateAdmissionQuery = "UPDATE admission SET 
    campus_id = ?, 
    faculty_id = ?, 
    course_id = ?, 
    level_id = ?, 
    passcode = ?
    WHERE user_id = ?";

$stmt = mysqli_prepare($conn, $updateAdmissionQuery);
mysqli_stmt_bind_param($stmt, "iisisi", $campus, $faculty, $course, $level, $passcode, $user_id);
mysqli_stmt_execute($stmt);

// Update guardian details in 'guardian' table
$updateGuardianQuery = "UPDATE guardian SET 
    guardian_name = ?, 
    guardian_occupation = ?, 
    guardian_phone = ? 
    WHERE user_id = ?";

$stmt = mysqli_prepare($conn, $updateGuardianQuery);
mysqli_stmt_bind_param($stmt, "sss", $guardianName, $guardianOccupation, $guardianPhone);
mysqli_stmt_execute($stmt);

// Handle File Uploads
$targetDir = "uploads/"; // Adjust as needed

// Result Certificate
if (isset($_FILES['resultCertificate']) && $_FILES['resultCertificate']['error'] == 0) {
    $resultCertName = basename($_FILES['resultCertificate']['name']);
    $targetFile = $targetDir . $resultCertName;
    $fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

    // Allow specific file types
    $allowedExtensions = array('jpg', 'jpeg', 'png', 'pdf'); // Add more extensions if needed
    if(in_array($fileType, $allowedExtensions)){
        if (move_uploaded_file($_FILES['resultCertificate']['tmp_name'], $targetFile)) {
            // Update certificate name in database (if needed)
            $updateCertQuery = "UPDATE certificate SET certificate_name = '$resultCertName' WHERE user_id = '$user_id' AND certificate_type = 'resultCertificate'";
            if (mysqli_query($conn, $updateCertQuery)) {
                // Update successful
            } else {
                echo "Error updating result certificate name in database: " . mysqli_error($conn);
            }
        } else {
            echo "Error uploading result certificate.";
        }
    } else {
        echo "Invalid file type for result certificate. Only JPG, JPEG, PNG, and PDF are allowed.";
    }
}

// Handle other certificate uploads (provisional, migration, character) similarly
// ... (Copy and adapt the code for each certificate) ...

// Handle Photo Upload
if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
    $photoName = basename($_FILES['photo']['name']);
    $targetFile = $targetDir . $photoName;
    $fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

    // Allow specific file types
    $allowedExtensions = array('jpg', 'jpeg', 'png'); 
    if(in_array($fileType, $allowedExtensions)){
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetFile)) {
            // Update photo name in database (if needed)
            $updatePhotoQuery = "UPDATE photo SET photo_name = '$photoName' WHERE user_id = '$user_id'";
            if (mysqli_query($conn, $updatePhotoQuery)) {
                // Update successful
            } else {
                echo "Error updating photo name in database: " . mysqli_error($conn);
            }
        } else {
            echo "Error uploading photo.";
        }
    } else {
        echo "Invalid file type for photo. Only JPG, JPEG, and PNG are allowed.";
    }
}

// Redirect to display.php
header("Location: display.php?user_id=$user_id");
exit();

mysqli_close($conn);
?>