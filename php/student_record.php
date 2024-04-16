<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Student Records</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        body {
            background-color: #f0f0f0;
            padding-top: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .container h2 {
            margin-bottom: 20px;
        }
        .striped {
            background-color: #fafafa;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        include('../db/connection.php');
        $sql_student = "SELECT * FROM student";
        $result_student = $conn->query($sql_student);
        if ($result_student->num_rows > 0) {
            echo "<h4 class='center-align'>Student Records</h4>";
            echo "<table class='striped'>";
            echo "<thead><tr><th>Name</th><th>Father's Name</th><th>Date of Birth</th><th>Address</th><th>Enrollment Date</th></tr></thead>";
            echo "<tbody>";
            while($row_student = $result_student->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row_student["Name"] . "</td>";
                echo "<td>" . $row_student["Father_name"] . "</td>";
                echo "<td>" . $row_student["Dob"] . "</td>";
                echo "<td>" . $row_student["address"] . "</td>";
                echo "<td>" . $row_student["edate"] . "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>No student records found</p>";
        }
        $sql_guardian = "SELECT s.Name AS student_name, g.Name AS guardian_name, gt.Type AS guardian_type
                        FROM student_guardian sg
                        INNER JOIN student s ON sg.student_id = s.ID
                        INNER JOIN guardian g ON sg.guardian_id = g.ID
                        INNER JOIN guardian_type gt ON sg.guardian_type_id = gt.ID";
        $result_guardian = $conn->query($sql_guardian);
        if ($result_guardian->num_rows > 0) {
            echo "<h4 class='center-align'>Student Guardian Records</h4>";
            echo "<table class='striped'>";
            echo "<thead><tr><th>Student Name</th><th>Guardian Name</th><th>Guardian Type</th></tr></thead>";
            echo "<tbody>";
            while($row_guardian = $result_guardian->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row_guardian["student_name"] . "</td>";
                echo "<td>" . $row_guardian["guardian_name"] . "</td>";
                echo "<td>" . $row_guardian["guardian_type"] . "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>No student guardian records found</p>";
        }
        $conn->close();
        ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
