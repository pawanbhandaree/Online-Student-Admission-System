
document.getElementById('loginForm').addEventListener('submit', function (e) {
    // Clear previous error messages
    document.getElementById('emailError').textContent = '';
    document.getElementById('passwordError').textContent = '';
  
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();
    let valid = true;

    // Email validation
// Get the email input value


// Regular expression for email validation
const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

// Reset error message
document.getElementById('emailError').textContent = '';

// Validate email
if (email === '') {
    document.getElementById('emailError').textContent = 'Email is mandatory.';
    valid = false;
} else if (!emailPattern.test(email)) {
    document.getElementById('emailError').textContent = 'Invalid email format!';
    valid = false;
}

    // Password validation
    if (password === '') {
        document.getElementById('passwordError').textContent = 'Password is mandatory.';
        valid = false;
    } else if (password.length < 5 || password.length > 10) {
        document.getElementById('passwordError').textContent = 'Password must be between 5 and 10 characters!';
        valid = false;
    }

    // If the form is not valid, prevent submission
    if (!valid) {
        e.preventDefault(); // Only prevent submission if validation fails
    }
    // If valid, form submission proceeds, and the login process continues
});

document.addEventListener("DOMContentLoaded", function () {
    let eyeIcon = document.getElementById("eyeIcon");
    let passwordField = document.getElementById("password");

    if (eyeIcon) {
        eyeIcon.addEventListener("click", function () {
            if (passwordField.type === "password") {
                passwordField.type = "text";
                eyeIcon.innerHTML = "👁️"; // Change to slashed-eye icon
            } else {
                passwordField.type = "password";
                eyeIcon.innerHTML = "👁️‍🗨️"; // Change back to open-eye icon
            }
        });
    }
});
