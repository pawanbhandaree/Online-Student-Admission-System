<?php
// Database connection
function get_db_connection() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "finalproject";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function get_detailed_report($conn) {
    $query = "
    SELECT campus.campus_name AS College, course.course_name AS Course, COUNT(admission.user_id) AS Student_Count
    FROM admission
    JOIN campus ON admission.campus_id = campus.campus_id
    JOIN course ON admission.course_id = course.course_id
    GROUP BY campus.campus_name, course.course_name
    ORDER BY campus.campus_name, course.course_name;";
    
    return $conn->query($query);
}

function get_totals_report($conn) {
    $query = "
    SELECT campus.campus_name AS College, COUNT(admission.user_id) AS Total_Students
    FROM admission
    JOIN campus ON admission.campus_id = campus.campus_id
    GROUP BY campus.campus_name
    ORDER BY campus.campus_name;";
    
    return $conn->query($query);
}

function get_grand_total($conn) {
    $query = "SELECT COUNT(*) FROM admission;";
    $result = $conn->query($query);
    return $result->fetch_row()[0];
}

$conn = get_db_connection();
$detailed_data = get_detailed_report($conn);
$totals_data = get_totals_report($conn);
$grand_total = get_grand_total($conn);
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Admission Report</title>
   <link rel ="stylesheet" href="styles/report.css">
    <script>
        function printSection(sectionId) {
            var printContents = document.getElementById(sectionId).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
        function sortTable(n, tableId) {
            var table = document.getElementById(tableId);
            var rows = Array.from(table.rows).slice(1);
            var ascending = table.getAttribute('data-sort') !== 'asc';
            table.setAttribute('data-sort', ascending ? 'asc' : 'desc');
            rows.sort((rowA, rowB) => {
                var cellA = rowA.cells[n].innerText.toLowerCase();
                var cellB = rowB.cells[n].innerText.toLowerCase();
                return ascending ? cellA.localeCompare(cellB) : cellB.localeCompare(cellA);
            });
            rows.forEach(row => table.appendChild(row));
        }
    </script>
</head>
<body>
<header>
<a href="admin_display.php" class="back-button">&larr; Back to Display</a>
    </header>
    <h1>Student Admission Report</h1>
    
    <div class="print-section" id="detailed-report">
        <h2>Course-wise Report (By College)</h2>
        <button class="print-button" onclick="printSection('detailed-report')">Print This Section</button>
        <table id="detailedTable" data-sort="asc">
            <thead>
                <tr>
                    <th onclick="sortTable(0, 'detailedTable')">College</th>
                    <th onclick="sortTable(1, 'detailedTable')">Course</th>
                    <th onclick="sortTable(2, 'detailedTable')">Number of Admissions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $detailed_data->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['College']) ?></td>
                        <td><?= htmlspecialchars($row['Course']) ?></td>
                        <td><?= htmlspecialchars($row['Student_Count']) ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    
    <div class="print-section" id="totals-report">
        <h2>Total Admission per College</h2>
        <button class="print-button" onclick="printSection('totals-report')">Print This Section</button>
        <table id="totalsTable" data-sort="asc">
            <thead>
                <tr>
                    <th onclick="sortTable(0, 'totalsTable')">College</th>
                    <th onclick="sortTable(1, 'totalsTable')">Total Admissions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $totals_data->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['College']) ?></td>
                        <td><?= htmlspecialchars($row['Total_Students']) ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    
    <div class="print-section" id="grand-total">
        <h2>Grand Total Admissions</h2>
        <button class="print-button" onclick="printSection('grand-total')">Print This Section</button>
        <p><strong>Total Number of Admissions:</strong> <?= htmlspecialchars($grand_total) ?></p>
    </div>
</body>
</html>
