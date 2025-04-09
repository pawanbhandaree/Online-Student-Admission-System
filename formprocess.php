<?php
session_start();
include("connection.php");

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    echo "<script>alert('Please log in first.'); window.location.href = 'logout.php';</script>";
    exit;
}

$email = $_SESSION['email']; // Get email from session for consistency

// Ensure all required form fields are provided (including level_id)
if (!isset($_POST['level_id'])) {
    echo "Error: Level ID is required!";
    exit;
}

$new_level_id = $_POST['level_id']; // Get the new level ID

try {
    // Fetch existing user details based on email
    $selectUserQuery = "SELECT user_id FROM users WHERE email = ?";
    $stmt = $conn->prepare($selectUserQuery);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $userResult = $stmt->get_result();

    if ($userResult->num_rows > 0) {
        $userData = $userResult->fetch_assoc();
        $user_id = $userData['user_id'];

        // Fetch existing campus_id, faculty_id, and course_id from the admission table
        $selectAdmissionQuery = "SELECT campus_id, faculty_id, course_id FROM admission WHERE user_id = ?";
        $stmt = $conn->prepare($selectAdmissionQuery);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $admissionResult = $stmt->get_result();

        if ($admissionResult->num_rows > 0) {
            $admissionData = $admissionResult->fetch_assoc();
            $campus_id = $admissionData['campus_id'];
            $faculty_id = $admissionData['faculty_id'];
            $course_id = $admissionData['course_id'];
            $status = 'Pending'; // Default status

            // Insert new admission record with the new level_id
            $insertAdmissionQuery = "INSERT INTO admission (user_id, campus_id, course_id, faculty_id, level_id, status)
                                     VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($insertAdmissionQuery);
            $stmt->bind_param("iiiiis", $user_id, $campus_id, $course_id, $faculty_id, $new_level_id, $status);
            $stmt->execute();

            // Success message and redirect
            echo "<script>alert('New admission successfully submitted with the new level!'); window.location.href = 'khalti-payment/checkout.php';</script>";
        } else {
            echo "<script>alert('No existing admission record found!'); window.location.href = 'dashboard.php';</script>";
        }
    } else {
        echo "<script>alert('User not found!'); window.location.href = 'login.php';</script>";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
