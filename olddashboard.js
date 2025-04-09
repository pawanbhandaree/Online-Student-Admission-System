document.addEventListener("DOMContentLoaded", function () {
    // Course to Levels Mapping
    const courseToLevels = {
      "Bachelor of Computer Applications(BCA)": ["1st Semester", "2nd Semester", "3rd Semester", "4th Semester", "5th Semester", "6th Semester", "7th Semester", "8th Semester"],
      "Bachelor of Arts in Social Work(BASW)": ["1st Year", "2nd Year", "3rd Year", "4th Year"],
      "Bachelor of Arts(BA)": ["1st Year", "2nd Year", "3rd Year", "4th Year"],
      "Bachelor of Business Studies(BBS)": ["1st Year", "2nd Year", "3rd Year", "4th Year"],
      "Bachelor of Business Administration(BBA)": ["1st Semester", "2nd Semester", "3rd Semester", "4th Semester", "5th Semester", "6th Semester", "7th Semester", "8th Semester"],
      "Bachelor of Information Management(BIM)": ["1st Semester", "2nd Semester", "3rd Semester", "4th Semester", "5th Semester", "6th Semester", "7th Semester", "8th Semester"],
      "Bachelor of Business Management(BBM)": ["1st Semester", "2nd Semester", "3rd Semester", "4th Semester", "5th Semester", "6th Semester", "7th Semester", "8th Semester"],
      "Bachelor of Hotel Management(BHM)": ["1st Semester", "2nd Semester", "3rd Semester", "4th Semester", "5th Semester", "6th Semester", "7th Semester", "8th Semester"],
      "Bachelor of Travel and Tourism(BT)": ["1st Semester", "2nd Semester", "3rd Semester", "4th Semester", "5th Semester", "6th Semester", "7th Semester", "8th Semester"],
      "Bachelor of Science(B.Sc)": ["1st Year", "2nd Year", "3rd Year", "4th Year"],
      "B.Sc. in Computer Science and IT(B.Sc. CSIT)": ["1st Semester", "2nd Semester", "3rd Semester", "4th Semester", "5th Semester", "6th Semester", "7th Semester", "8th Semester"],
      "Bachelor of Information and Technology(BIT)": ["1st Semester", "2nd Semester", "3rd Semester", "4th Semester", "5th Semester", "6th Semester", "7th Semester", "8th Semester"],
      "Bachelor of Education(BEd)": ["1st Year", "2nd Year", "3rd Year", "4th Year"],
      "Bachelor of Civil Engineering(CE)": ["1st Semester", "2nd Semester", "3rd Semester", "4th Semester", "5th Semester", "6th Semester", "7th Semester", "8th Semester"],
      "Bachelor of Mechanical Engineering(ME)": ["1st Semester", "2nd Semester", "3rd Semester", "4th Semester", "5th Semester", "6th Semester", "7th Semester", "8th Semester"],
      "Bachelor of Computer Engineering(Co.E)": ["1st Semester", "2nd Semester", "3rd Semester", "4th Semester", "5th Semester", "6th Semester", "7th Semester", "8th Semester"],
      "Bachelor of Laws(LLB)": ["1st Year", "2nd Year", "3rd Year", "4th Year"],
      "Bachelor of Arts in Laws(BALLB)": ["1st Year", "2nd Year", "3rd Year", "4th Year"],
      "Bachelor of Public Health(BPH)": ["1st Year", "2nd Year", "3rd Year", "4th Year"],
      "Bachelor of Medical Laboratory Technology(BMLT)": ["1st Year", "2nd Year", "3rd Year", "4th Year"],
      "Bachelor of Pharmacy(B.Pharm)": ["1st Year", "2nd Year", "3rd Year", "4th Year"],
      "Bachelor of Medicine Bachelor of Surgery(MBBS)": ["1st Year", "2nd Year", "3rd Year", "4th Year"]
    };

    // Get selected course from hidden input
    const selectedCourse = document.getElementById("selectedCourse").value;
    
    // Get level dropdown
    const levelDropdown = document.getElementById("levelDropdown");

    // Clear existing options
    levelDropdown.innerHTML = "";

    // Populate levels based on the selected course
    if (courseToLevels[selectedCourse]) {
      courseToLevels[selectedCourse].forEach(level => {
        let option = document.createElement("option");
        option.value = level;
        option.textContent = level;
        levelDropdown.appendChild(option);
      });
    } else {
      let option = document.createElement("option");
      option.textContent = "No levels available";
      levelDropdown.appendChild(option);
    }
  });
