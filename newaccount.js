function togglePassword() {
    let passwordField = document.getElementById("password");
    let eyeIcon = document.getElementById("eyeIcon");

    if (passwordField.type === "password") {
        passwordField.type = "text";
        eyeIcon.innerHTML = "👁️"; // Change to slashed-eye icon
    } else {
        passwordField.type = "password";
        eyeIcon.innerHTML = "👁️‍🗨️"; // Change back to open-eye icon
    }

    // Keep the cursor at the end
    let value = passwordField.value;
    passwordField.value = "";
    passwordField.value = value;
}

document.getElementById('registerForm').addEventListener('submit', function (e) {
    // Clear previous error messages
    document.getElementById('emailError').textContent = '';
    document.getElementById('passwordError').textContent = '';
    document.getElementById('usernameError').textContent = '';

    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();
    const username = document.getElementById('username').value.trim();
    let valid = true;

    // Username validation
    function validateUsername(username) {
        // Check if username is empty
        if (username === '') {
            return 'Username is mandatory.';
        }

        // Check username length
        if (username.length < 5 || username.length > 20) {
            return 'Username must be between 5 and 20 characters long!';
        }

        // Check if username contains only letters, numbers, and underscores
        const usernamePattern = /^[a-zA-Z0-9_]+$/;
        if (!usernamePattern.test(username)) {
            return 'Username can only contain letters, numbers, and underscores!';
        }

        return ''; // No error
    }

    const usernameError = validateUsername(username);
    if (usernameError) {
        document.getElementById('usernameError').textContent = usernameError;
        valid = false;
    }

    // Email validation
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (email === '') {
        document.getElementById('emailError').textContent = 'Email is mandatory.';
        valid = false;
    } else if (!emailPattern.test(email)) {
        document.getElementById('emailError').textContent = 'Invalid email format!';
        valid = false;
    }

    // Password validation function
    function validatePassword(password) {
        // Check if password is empty
        if (password === '') {
            return 'Password is mandatory.';
        }

        // Check password length
        if (password.length < 5 || password.length > 10) {
            return 'Password must be between 5 and 10 characters long!';
        }

        // Check for at least one lowercase letter
        if (!/[a-z]/.test(password)) {
            return 'Password must include at least one lowercase letter!';
        }

        // Check for at least one uppercase letter
        if (!/[A-Z]/.test(password)) {
            return 'Password must include at least one uppercase letter!';
        }

        // Check for at least one digit
        if (!/\d/.test(password)) {
            return 'Password must include at least one number!';
        }

        // Check for at least one special character
        const specialCharacters = /[@$!%*?&]/;
        if (!specialCharacters.test(password)) {
            return 'Password must include at least one special character (e.g., @$!%*?&)';
        }

        // Check if password contains invalid characters
        const validCharacters = /^[A-Za-z\d@$!%*?&]+$/;
        if (!validCharacters.test(password)) {
            return 'Password contains invalid characters! Only use letters, numbers and @$!%*?&.';
        }

        return ''; // No error
    }

    // Validate the password and show the error if it exists
    const passwordError = validatePassword(password);
    if (passwordError) {
        document.getElementById('passwordError').textContent = passwordError;
        valid = false;
    }

    // If the form is not valid, prevent submission
    if (!valid) {
        e.preventDefault(); // Only prevent submission if validation fails
    }
    // If valid, form submission proceeds, and the login process continues
});
