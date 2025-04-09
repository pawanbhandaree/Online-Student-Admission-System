document.getElementById('updateForm').addEventListener('submit', function(event) {
    let isValid = true;

    // Validate Campus
    const campus = document.getElementById('campus').value;
    if (campus === "") {
        document.getElementById('campusErr').innerText = "Please select a campus.";
        isValid = false;
    } else {
        document.getElementById('campusErr').innerText = "";
    }

    // Validate Faculty
    const faculty = document.getElementById('faculty').value;
    if (faculty === "") {
        document.getElementById('facultyErr').innerText = "Please select a faculty.";
        isValid = false;
    } else {
        document.getElementById('facultyErr').innerText = "";
    }

    // Validate Course
    const course = document.getElementById('course').value;
    if (course === "") {
        document.getElementById('courseErr').innerText = "Please select a course.";
        isValid = false;
    } else {
        document.getElementById('courseErr').innerText = "";
    }

    // Validate Level
    const level = document.getElementById('level').value;
    if (level === "") {
        document.getElementById('levelErr').innerText = "Please select a level.";
        isValid = false;
    } else {
        document.getElementById('levelErr').innerText = "";
    }

    // Prevent form submission if validation fails
    if (!isValid) {
        event.preventDefault();
    }
});