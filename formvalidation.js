document.addEventListener("DOMContentLoaded", function () {
    // Event listener for form submission
    document.getElementById("admissionForm").addEventListener("submit", function (event) {
        let isValid = true;

        // Full Name validation
        const firstName = document.getElementById("first_name").value.trim();
        if (firstName === "") {
            document.getElementById("firstnameError").textContent = "First name is required.";
            isValid = false;
        } else {
            document.getElementById("firstnameError").textContent = "";
        }
        const lastName = document.getElementById("last_name").value.trim();
        if (lastName === "") {
            document.getElementById("lastnameError").textContent = "Last name is required.";
            isValid = false;
        } else {
            document.getElementById("lastnameError").textContent = "";
        }
       
        // Phone validation
        const phone = document.getElementById("phone").value.trim();
        const phonePattern = /^[0-9]{10}$/;
        if (phone === "") {
            document.getElementById("phoneError").textContent = "Phone number is required.";
            isValid = false;
        } else if (!phonePattern.test(phone)) {
            document.getElementById("phoneError").textContent = "Phone number must be 10 digits.";
            isValid = false;
        } else {
            document.getElementById("phoneError").textContent = "";
        }

        // Date of Birth validation
        const dob = document.getElementById("dob");
        const dobError = document.getElementById("dobError");
        const dobValue = dob.value;

        if (dobValue === "") {
            dobError.textContent = "Date of birth is required.";
            isValid = false; // Invalid if no date is entered
        } else {
            const dobDate = new Date(dobValue);
            const today = new Date(); // Get today's date dynamically

            // Ensure DOB is not a future date
            if (dobDate > today) {
                dobError.textContent = "Date of birth cannot be in the future.";
                isValid = false; // Invalid if DOB is in the future
            } else {
                // Calculate age
                let age = today.getFullYear() - dobDate.getFullYear();
                const monthDifference = today.getMonth() - dobDate.getMonth();
                const dayDifference = today.getDate() - dobDate.getDate();

                // Adjust age if birthday has not yet occurred this year
                if (monthDifference < 0 || (monthDifference === 0 && dayDifference < 0)) {
                    age--;
                }

                // Validate age range: Must be between 18 and 35
                if (age < 18) {
                    dobError.textContent = "You must be at least 18 years old to apply.";
                    isValid = false; // Invalid if age is less than 18
                } else if (age > 35) {
                    dobError.textContent = "You must be under 36 years old to apply.";
                    isValid = false; // Invalid if age is more than 35
                } else {
                    dobError.textContent = ""; // Clear the error message if age is valid
                }
            }
        }
        const blood = document.getElementById("blood_group").value;
        if (blood === "") {
            document.getElementById("bloodGroupError").textContent = "Please select a blood group";
            isValid = false;
        } else {
            document.getElementById("bloodGroupError").textContent = "";
        }

        // Gender validation
        const gender = document.getElementById("gender").value;
        if (gender === "") {
            document.getElementById("genderError").textContent = "Gender is required.";
            isValid = false;
        } else {
            document.getElementById("genderError").textContent = "";
        }

        // Address validation
        const address = document.getElementById("address").value.trim();
        if (address === "") {
            document.getElementById("addressError").textContent = "Address is required.";
            isValid = false;
        } else {
            document.getElementById("addressError").textContent = "";
        }

        // Campus validation
        const campus = document.getElementById("campus").value;
        if (campus === "") {
            document.getElementById("campusError").textContent = "Please select a campus.";
            isValid = false;
        } else {
            document.getElementById("campusError").textContent = "";
        }

        // Department validation
        const department = document.getElementById("department").value;
        if (department === "") {
            document.getElementById("departmentError").textContent = "Please select a department.";
            isValid = false;
        } else {
            document.getElementById("departmentError").textContent = "";
        }

        // Course validation
        const course = document.getElementById("course").value;
        if (course === "") {
            document.getElementById("courseError").textContent = "Please select a course.";
            isValid = false;
        } else {
            document.getElementById("courseError").textContent = "";
        }
        // level validation
        const level = document.getElementById("level").value;
        if (level === "") {
            document.getElementById("subCourseError").textContent = "Please select your academic term.";
            isValid = false;
        } else {
            document.getElementById("subCourseError").textContent = "";
        }
//guardian
        const guardiansName = document.getElementById("guardian_name").value;
        if (guardiansName === "") {
            document.getElementById("guardiansNameError").textContent = "Guardian Name is required.";
            isValid = false;
        } else {
            document.getElementById("guardiansNameError").textContent = "";
        }
        const guardiansOccupation = document.getElementById("guardian_occupation").value;
        if (guardiansOccupation === "") {
            document.getElementById("guardiansOccupationError").textContent = "Guardian Occupation is required.";
            isValid = false;
        } else {
            document.getElementById("guardiansOccupationError").textContent = "";
        }
        const guardiansPhone = document.getElementById("guardian_phone").value.trim();
        const pattern = /^[0-9]{10}$/;
        if (guardiansPhone === "") {
            document.getElementById("guardiansPhoneError").textContent = "Phone number is required.";
            isValid = false;
        } else if (!pattern.test(guardiansPhone)) {
            document.getElementById("guardiansPhoneError").textContent = "Phone number must be 10 digits.";
            isValid = false;
        } else {
            document.getElementById("guardiansPhoneError").textContent = "";
        }
     // Photo validation
const photo = document.getElementById("photo").files[0];
const allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
const maxFileSize = 2 * 1024 * 1024; // 2 MB in bytes

if (!photo) {
    document.getElementById("photoError").textContent = "Please upload a passport size photo.";
    isValid = false;
} else if (!allowedExtensions.test(photo.name)) {
    document.getElementById("photoError").textContent = "Photo must be in JPEG or PNG format.";
    isValid = false;
} else if (photo.size > maxFileSize) {
    document.getElementById("photoError").textContent = "Photo size must not exceed 2 MB.";
    isValid = false;
} else {
    document.getElementById("photoError").textContent = "";
}

// Result Certificate validation
const resultCertificate = document.getElementById("resultCertificate").files[0];
if (!resultCertificate) {
    document.getElementById("resultCertificateError").textContent = "Result certificate is required.";
    isValid = false;
} else if (resultCertificate.size > maxFileSize) {
    document.getElementById("resultCertificateError").textContent = "Result certificate size must not exceed 2 MB.";
    isValid = false;
} else {
    document.getElementById("resultCertificateError").textContent = "";
}

// Provisional Certificate validation
const provisionalCertificate = document.getElementById("provisionalCertificate").files[0];
if (!provisionalCertificate) {
    document.getElementById("provisionalCertificateError").textContent = "Provisional certificate is required.";
    isValid = false;
} else if (provisionalCertificate.size > maxFileSize) {
    document.getElementById("provisionalCertificateError").textContent = "Provisional certificate size must not exceed 2 MB.";
    isValid = false;
} else {
    document.getElementById("provisionalCertificateError").textContent = "";
}

// Migration Certificate validation
const migrationCertificate = document.getElementById("migrationCertificate").files[0];
if (!migrationCertificate) {
    document.getElementById("migrationCertificateError").textContent = "Migration certificate is required.";
    isValid = false;
} else if (migrationCertificate.size > maxFileSize) {
    document.getElementById("migrationCertificateError").textContent = "Migration certificate size must not exceed 2 MB.";
    isValid = false;
} else {
    document.getElementById("migrationCertificateError").textContent = "";
}

// Character Certificate validation
const characterCertificate = document.getElementById("characterCertificate").files[0];
if (!characterCertificate) {
    document.getElementById("characterCertificateError").textContent = "Character certificate is required.";
    isValid = false;
} else if (characterCertificate.size > maxFileSize) {
    document.getElementById("characterCertificateError").textContent = "Character certificate size must not exceed 2 MB.";
    isValid = false;
} else {
    document.getElementById("characterCertificateError").textContent = "";
}

const passcode = document.getElementById("passcode").value.trim();
if (passcode === "") {
    document.getElementById("passcodeError").textContent = "Entrance passcode is required.";
    isValid = false;
} else if (passcode.length < 8) { // Assuming minimum length of 8 characters
    document.getElementById("passcodeError").textContent = "Passcode must be at least 8 characters long.";
    isValid = false;
} else {
    document.getElementById("passcodeError").textContent = "";
}



        // Terms and Conditions validation
        const termsCheckbox = document.getElementById("termsCheckbox");
        if (!termsCheckbox.checked) {
            document.getElementById("checkboxError").textContent = "You must agree to the terms & conditions.";
            isValid = false;
        } else {
            document.getElementById("checkboxError").textContent = "";
        }

        // Prevent form submission if any field is invalid
        if (!isValid) {
            event.preventDefault();
        }
    });
});



