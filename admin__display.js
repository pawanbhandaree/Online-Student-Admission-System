// Search by Name
function searchByName() {
    performSearch('searchInput', [1, 2, 3]); // Full Name, Phone, Email columns
}

// Search by Course
function searchByCourse() {
    performSearch('searchInput1', [8]); // Course column (index 8)
}

// Search by Campus
function searchByCampus() {
    performSearch('searchInput2', [6]); // Campus column (index 6)
}

function performSearch(inputId, columnIndexes) {
    const input = document.getElementById(inputId).value.trim().toLowerCase();
    const table = document.getElementById('studentTable');
    const rows = table.querySelectorAll('tbody tr'); // Target table body rows only

    let found = false;

    rows.forEach(row => {
        const columns = row.querySelectorAll('td');
        if (columns.length > 0) {
            let matchFound = columnIndexes.some(index => {
                if (columns[index]) {
                    const cellText = columns[index].textContent.trim().toLowerCase();

                    // Check if the cell text starts with the input (for first letter)
                    if (input.length === 1) {
                        return cellText.startsWith(input);
                    } else {
                        // For longer inputs, check if the input is contained anywhere in the cell text
                        return cellText.includes(input);
                    }
                }
                return false;
            });

            if (matchFound) {
                row.style.display = ''; // Show row
                found = true;
            } else {
                row.style.display = 'none'; // Hide row
            }
        }
    });

    toggleNoRecordMessage(found, table);
}