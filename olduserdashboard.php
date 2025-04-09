<?php
session_start();
include("connection.php");

// Check if the user is logged in
if (!isset($_SESSION['login_id'])) {
    echo "<script>alert('Please log in first.'); window.location.href = 'logout.php';</script>";
    exit;
}

$login_id = $_SESSION['login_id'];

try {
    // Fetch email and user_id based on login ID
    $userQuery = "
        SELECT u.user_id, u.first_name, u.middle_name, u.last_name, u.phone_no, u.dob, u.gender, u.address, l.email 
        FROM users u
        JOIN login l ON u.email = l.email
        WHERE l.login_id = ?";
    $stmt = $conn->prepare($userQuery);
    $stmt->bind_param("i", $login_id);
    $stmt->execute();
    $userResult = $stmt->get_result();
    $userData = $userResult->fetch_assoc();

    if (!$userData) {
        throw new Exception("User details not found.");
    }

    $user_id = $userData['user_id']; // Use user_id for further queries

    // Fetch guardian details
    $guardianQuery = "SELECT guardian_name, guardian_occupation, guardian_phone FROM guardian WHERE user_id = ?";
    $stmt = $conn->prepare($guardianQuery);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $guardianResult = $stmt->get_result();
    $guardianData = $guardianResult->fetch_assoc();

    if (!$guardianData) {
        $guardianData = ['guardian_name' => 'N/A', 'guardian_occupation' => 'N/A', 'guardian_phone' => 'N/A'];
    }

    // Fetch admission details without ordering by date
    $admissionQuery = "
        SELECT c.campus_name, co.course_name, f.faculty_name, l.level_name, a.status 
        FROM admission a
        JOIN campus c ON a.campus_id = c.campus_id
        JOIN course co ON a.course_id = co.course_id
        JOIN faculty f ON a.faculty_id = f.faculty_id
        JOIN level l ON a.level_id = l.level_id
        WHERE a.user_id = ?";
    $stmt = $conn->prepare($admissionQuery);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $admissionResult = $stmt->get_result();
    $admissionData = $admissionResult->fetch_assoc();

    if (!$admissionData) {
        $admissionData = ['campus_name' => 'N/A', 'course_name' => 'N/A', 'faculty_name' => 'N/A', 'level_name' => 'N/A', 'status' => 'N/A'];
    }

    // Fetch uploaded certificates without ordering by upload date
    $certificateQuery = "SELECT certificate_type, certificate_name FROM certificate WHERE user_id = ?";
    $stmt = $conn->prepare($certificateQuery);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $certificateResult = $stmt->get_result();
    $certificates = $certificateResult->fetch_all(MYSQLI_ASSOC);

    // Fetch uploaded photo without ordering by photo upload date
    $photoQuery = "SELECT photo_name FROM photo WHERE user_id = ?";
    $stmt = $conn->prepare($photoQuery);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $photoResult = $stmt->get_result();
    $photoData = $photoResult->fetch_assoc();

    // Fetch available levels for the dropdown
    $levelQuery = "SELECT level_id, level_name FROM level";
    $stmt = $conn->prepare($levelQuery);
    $stmt->execute();
    $levelResult = $stmt->get_result();
    $levels = $levelResult->fetch_all(MYSQLI_ASSOC);
 
} catch (Exception $e) {
    echo "Error fetching data: " . $e->getMessage();
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
  <link rel="stylesheet" href="styles/old_dashboard.css">
</head>

<body>
<header>
    <div class="header-content">
        <h1>Online Student Admission System</h1>
        <nav>
            <ul>
              
                <li><a href="display.php" class="logout-btn">Previous Details</a></li>
                <li><a href="logout.php" class="logout-btn">Logout</a></li>
            </ul>
        </nav>
    </div>
</header>

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
?>  <!-- Navigation Bar -->
 

  <main>


    <form action="formprocess.php" method="POST">
    <h2>Welcome to the dashboard</h2>
      <section id="user-info" class="user-info">
        <h2>Your Details</h2>
        <div class="info-row">
        <h3>Photo</h3>
       <center> <img src="uploads/photos/<?= htmlspecialchars($photoData['photo_name']) ?>" alt="Passport Photo" width="150"></center>
          <strong>Full Name:</strong> <?= htmlspecialchars($userData['first_name'] . " " . $userData['middle_name'] . " " . $userData['last_name']) ?> |
          <strong>Phone Number:</strong> <?= htmlspecialchars($userData['phone_no']) ?> |
          <strong>Date of Birth:</strong> <?= htmlspecialchars($userData['dob']) ?> |
          <strong>Gender:</strong> <?= htmlspecialchars($userData['gender']) ?> |
          <strong>Address:</strong> <?= htmlspecialchars($userData['address']) ?> |
          <strong>Email:</strong> <?= htmlspecialchars($userData['email']) ?>
        
        </div>
      </section>

      <section id="guardian-info" class="guardian-info">
        <h2>Guardian Details</h2>
        <div class="info-row">
          <strong>Name:</strong> <?= htmlspecialchars($guardianData['guardian_name']) ?> |
          <strong>Occupation:</strong> <?= htmlspecialchars($guardianData['guardian_occupation']) ?> |
          <strong>Phone Number:</strong> <?= htmlspecialchars($guardianData['guardian_phone']) ?>
        </div>
      </section>

      <section id="admission-info" class="admission-info">
        <h2>Admission Details</h2>
        <div class="info-row">
          <strong>Campus:</strong> <?= htmlspecialchars($admissionData['campus_name']) ?> |
          <strong>Course:</strong> <?= htmlspecialchars($admissionData['course_name']) ?> |
          <strong>Faculty:</strong> <?= htmlspecialchars($admissionData['faculty_name']) ?>
        </div>
      </section>

      <section id="uploaded-docs" class="uploaded-docs">
        <h2>Uploaded Documents</h2>
        <ul>
          <?php foreach ($certificates as $certificate): ?>
            <li><?= htmlspecialchars($certificate['certificate_type']) ?>: <a href="uploads/certificates/<?= htmlspecialchars($certificate['certificate_name']) ?>" target="_blank">View</a></li>
          <?php endforeach; ?>
        </ul>
      </section>

      <!-- New Section for Payment -->
      <section id="payment-section" class="payment-section">
        <h3>START ADMISSION</h3>
        <div class="payment-container">
          <!-- Level Dropdown -->
       
<!-- Hidden input to store the selected course -->
<input type="hidden" id="selectedCourse" value="<?= htmlspecialchars($admissionData['course_name']) ?>">

<div class="level-dropdown">
  <strong>Level:</strong>
  <select name="level_id" id="levelDropdown" required>
    <!-- Levels will be populated dynamically -->
  </select>
</div>


     
<!-- Submit Button -->
<section class="submit-section">
  <button type="submit" class="submit-button">Submit as New Admission</button>
</section>
      
    </form>
  </main>
  
  <footer>
    <p>&copy; 2025 Online Student Admission System</p>
  </footer>
<script src="script/olddashboard.js"></script>
</body>

</html>
