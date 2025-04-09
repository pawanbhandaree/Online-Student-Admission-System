document.addEventListener("DOMContentLoaded", function () {
    const dropdowns = [
        { buttonId: "bachelorPrograms", menuId: "coursesDropdown" },
        { buttonId: "campusLink", menuId: "campusDropdown" },
    ];

    dropdowns.forEach(({ buttonId, menuId }) => {
        const button = document.getElementById(buttonId);
        const menu = document.getElementById(menuId);

        button.addEventListener("click", (event) => {
            event.preventDefault(); // Prevent the default link behavior
            closeAllDropdowns(menuId); // Close other dropdowns
            menu.classList.toggle("hidden"); // Toggle visibility
        });
    });

    // Close dropdowns when clicking outside
    document.addEventListener("click", (event) => {
        if (!event.target.closest(".navbar")) {
            closeAllDropdowns();
        }
    });

    function closeAllDropdowns(exceptionId = null) {
        dropdowns.forEach(({ menuId }) => {
            if (menuId !== exceptionId) {
                document.getElementById(menuId).classList.add("hidden");
            }
        });
    }
});

$(document).ready(function() {
    // Initially hide all campus content
    $('.campus-content').hide();
  
    // Show Central Campus content by default
    $('#central-campus').show();
  
    // Click event for tabs
    $('#campus-tabs ul li a').on('click', function(e) {
      e.preventDefault();
  
      // Hide all campus content
      $('.campus-content').hide();
  
      // Show the content for the clicked tab
      var target = $(this).attr('href');
      $(target).fadeIn();
    });
  });
  const links = document.querySelectorAll('#campus-tabs a');
  const contents = document.querySelectorAll('.campus-content');

  links.forEach(link => {
    link.addEventListener('click', (e) => {
      e.preventDefault();
      const targetId = link.getAttribute('href').substring(1);

      contents.forEach(content => {
        content.classList.remove('active');
      });

      document.getElementById(targetId).classList.add('active');
    });
  });
 // Handle dropdown toggle
 document.querySelectorAll('.dropdown-toggle').forEach(toggle => {
  toggle.addEventListener('click', (e) => {
      e.preventDefault();
      const dropdown = toggle.parentElement;
      dropdown.classList.toggle('active');
  });
});

// Handle item selection
document.querySelectorAll('.dropdown-menu a').forEach(item => {
  item.addEventListener('click', (e) => {
      e.preventDefault();
      const text = item.dataset.text;
      document.getElementById('output').textContent = `You selected: ${text}`;
  });
});

// Close dropdown if clicked outside
document.addEventListener('click', (e) => {
  if (!e.target.closest('.dropdown')) {
      document.querySelectorAll('.dropdown').forEach(dropdown => {
          dropdown.classList.remove('active');
      });
  }
});
// Function to dynamically load content
function loadContent(url) {
    const mainContent = document.getElementById("main-content");
  
    // Show a loading message
    mainContent.innerHTML = "<p>Loading...</p>";
  
    // Fetch content from the given URL
    fetch(url)
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not OK");
        }
        return response.text();
      })
      .then((html) => {
        mainContent.innerHTML = html; // Update the content
      })
      .catch((error) => {
        mainContent.innerHTML = `<p>Error loading content: ${error.message}</p>`;
      });
  }
  
  // Attach click event listeners to all dropdown links
  document.querySelectorAll(".dropdown-menu a").forEach((link) => {
    link.addEventListener("click", (e) => {
      e.preventDefault(); // Prevent default link behavior
      const pageUrl = "hello/" + link.getAttribute("href").substring(1) + ".html";
      ; 
      loadContent(pageUrl); // Call the loadContent function
    });
  });
  