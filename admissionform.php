<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Registration - Admission System</title>
  <link rel="stylesheet" href="styles/admissionform.css">
 
</head>

<body>
  <div id="heading">
  <h1>Online Student Admission System</h1>
  </div>
  <div class="container">
    <?php include("connection.php"); ?>
    <div class="registration-container">
      <h2>Admission Registration Form</h2>
      <form action="formprocess1.php" id="admissionForm" method="POST" enctype="multipart/form-data">
        
        <!-- Full Name -->
        <div class="form-row">
  <!-- Full Name Section -->
  <div class="form-group">
    <label for="first_name">First Name</label>
    <input type="text" id="first_name" name="first_name" placeholder="Enter your first name">
    <span class="error" id="firstnameError"></span>
  </div>
  <div class="form-group">
    <label for="middle_name">Middle Name (optional)</label>
    <input type="text" id="middle_name" name="middle_name" placeholder="Enter your middle name">
  </div>
  <div class="form-group">
    <label for="last_name">Last Name</label>
    <input type="text" id="last_name" name="last_name" placeholder="Enter your last name">
    <span class="error" id="lastnameError"></span>
  </div>
  <div class="form-group">
    <label for="dob">Date of Birth</label>
    <input type="date" id="dob" name="dob">
    <span class="error" id="dobError"></span>
</div>
</div>

<!-- Phone Number and Date of Birth -->
<div class="form-row">
  <div class="form-group">
    <label for="phone">Phone Number</label>
    <input type="tel" id="phone" name="phone" placeholder="Enter your phone number">
    <span class="error" id="phoneError"></span>
  </div>
  <div class="form-group">
    <label for="blood_group">Blood Group</label>
    <select id="blood_group" name="blood_group">
        <option value="">Select Blood Group</option>
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
    </select>
    <span class="error" id="bloodGroupError"></span>
</div>

</div>

<!-- Gender and Address -->
<div class="form-row">
  <div class="form-group">
    <label for="gender">Gender</label>
    <select id="gender" name="gender">
      <option value="">Select Gender</option>
      <option value="male">Male</option>
      <option value="female">Female</option>
      <option value="other">Other</option>
    </select>
    <span class="error" id="genderError"></span>
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" name="address" id="address" placeholder="Enter your address">
    <span class="error" id="addressError"></span>
  </div>
</div>


       

      
        <!-- Campus Name and Department -->
        <div class="form-group">
    <div class="half-width">
      <label for="campus">Select Campus</label>
      <select id="campus" name="campus" onchange="populateFaculties()">
        <option value="">Choose your campus</option>
        <option value="Mahendra Ratna Campus">Mahendra Ratna Campus, Ilam</option>
        <option value="Mechi Multiple Campus">Mechi Multiple Campus, Jhapa</option>
        <option value="Kanakai Multiple Campus">Kanakai Multiple Campus, Jhapa</option>
    <option value="Mahendra Bindeshwari Campus">Mahendra Bindeshwari Campus, Saptari</option>
    <option value="Dharan Campus">Dharan Campus, Dharan</option>
    <option value="Mahendra Morang Adarsha Campus">Mahendra Morang Adarsha Campus, Biratnagar</option>

    <!-- Central Region -->
    <option value="Shankhar Dev Campus">Shankhar Dev Campus,Kathmandu</option>
    <option value="Padma Kanya Multiple Campus">Padma Kanya Multiple Campus, Kathmandu</option>
    <option value="Ratna Rajya Campus">Ratna Rajya Campus, Kathmandu</option>
    <option value="Amrit Science Campus">Amrit Science Campus, Kathmandu</option>
    <option value="Public Youth Campus">Public Youth Campus, Kathmandu</option>
    <option value="Saraswati Multiple Campus">Saraswati Multiple Campus, Kathmandu</option>
    <option value="Baneshwor Multiple Campus">Baneshwor Multiple Campus, Kathmandu</option>
    <option value="Nepal Law Campus">Nepal Law Campus, Kathmandu</option>
    <option value="Bhaktapur Campus">Bhaktapur Campus, Bhaktapur</option>
    <option value="Patan Multiple Campus">Patan Multiple Campus, Lalitpur</option>
    <option value="Pulchowk Campus">Pulchowk Campus, Lalitpur</option>
    <option value="Thapathali Campus">Thapathali Campus, Kathmandu</option>
    <option value="Janamaitri Multiple Campus">Janamaitri Multiple Campus, Kathmandu</option>
    <option value="Makwanpur Multiple Campus">Makwanpur Multiple Campus, Hetauda</option>
    <option value="Mahendra Buddhikharma Campus">Mahendra Buddhikharma Campus, Dhading</option>

    <!-- Western Region -->
    <option value="Prithvi Narayan Campus">Prithvi Narayan Campus, Pokhara</option>
    <option value="Tansen Multiple Campus">Tansen Multiple Campus, Tansen</option>
    <option value="Padmodaya Campus">Padmodaya Campus, Palpa</option>
    <option value="Butwal Multiple Campus">Butwal Multiple Campus, Butwal</option>

    <!-- Mid-Western Region -->
    <option value="Mahendra Multiple Campus">Mahendra Multiple Campus, Nepalgunj</option>
        </select>
      <span class="error" id="campusError"></span>
    </div>
    <div class="half-width">
      <label for="department">Select Faculty</label>
      <select id="department" name="department" disabled>
        <option value="">Choose your Department</option>
      </select>
      <span class="error" id="departmentError"></span>
    </div>
  </div>

  <div class="form-group">
    <label for="course">Select Course</label>
    <select id="course" name="course" disabled>
      <option value="">Choose your course</option>
    </select>
    <span class="error" id="courseError"></span>
  </div>
  <div class="form-group">
    <label for="level">Select Level </label>
    <select id="level" name="level" disabled>
      <option value="">Choose Academic Term</option>
    </select>
    <span class="error" id="subCourseError"></span>
  </div>
        <div class="form-group">
          <div class="half-width">
            <label for="guardian_name">Guardian Name</label>
            <input type="text" name="guardian_name" id="guardian_name" placeholder="Enter parent name">
            <span class="error" id="guardiansNameError"></span>
          </div>
          <div class="half-width">
            <label for="guardian_occupation">Guardian Occupation</label>
            <input type="text" name="guardian_occupation" id="guardian_occupation" placeholder="Enter parent occupation">
            <span class="error" id="guardiansOccupationError"></span>
          </div>
        </div>

        <div class="form-group">
          <label for="guardian_phone">Guardian Phone Number</label>
          <input type="text" name="guardian_phone" id="guardian_phone" placeholder="Enter parent phone number">
          <span class="error" id="guardiansPhoneError"></span>
        </div>
        <!-- First Row for Certificates -->
        <div class="form-group">
          <div class="half-width">
            <label for="resultCertificate">Result Certificate</label>
            <input type="file" id="resultCertificate" name="resultCertificate" accept="image/jpeg, image/png">
            <span class="error" id="resultCertificateError"></span>
          </div>

          <div class="half-width">
            <label for="provisionalCertificate">Provisional Certificate</label>
            <input type="file" id="provisionalCertificate" name="provisionalCertificate" accept="image/jpeg, image/png">
            <span class="error" id="provisionalCertificateError"></span>
          </div>
        </div>

        <!-- Second Row for Certificates -->
        <div class="form-group">
          <div class="half-width">
            <label for="migrationCertificate">Migration Certificate</label>
            <input type="file" id="migrationCertificate" name="migrationCertificate" accept="image/jpeg, image/png">
            <span class="error" id="migrationCertificateError"></span>
          </div>

          <div class="half-width">
            <label for="characterCertificate">Character Certificate</label>
            <input type="file" id="characterCertificate" name="characterCertificate" accept="image/jpeg, image/png">
            <span class="error" id="characterCertificateError"></span>
          </div>
        </div>

        <!-- Passport Size Photo -->
        <div class="form-group">
          <div class="half-width">
            <label for="photo">Passport Size Photo</label>
            <input type="file" id="photo" name="photo" accept="image/jpeg, image/png">
            <span class="error" id="photoError"></span>
          </div>
          <div class="form-group" id="pass">
    <label for="passcode">Entrance Passcode</label>
    <input type="password" id="passcode" name="passcode" placeholder="Enter entrance passcode">
    <span class="error" id="passcodeError"></span>
</div>
        </div>

 

        <!-- Terms and Conditions -->
        <div class="check-group">
          <div class="center-content">
            <label> I agree to the terms & conditions</label><input type="checkbox" id="termsCheckbox">
          </div>
          <span class="error" id="checkboxError"></span>
        </div>


        <!-- Buttons -->
        <div class="button-group">
          <button type="reset" class="clear-btn">Clear</button>
          <button type="submit" class="submit-btn" name="register">Register</button>
          <a href="user_dashboard.php" class="cancel-btn">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <footer class="footer">
    &copy; 2025 Online Student Admission System
  </footer>
  <script src="script/formvalidation.js"></script>
  <script src="script/dropdown.js"></script>

</body>

</html>