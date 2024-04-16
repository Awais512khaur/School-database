<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Database</title>
    <!-- Materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f0f0f0;
            padding-top: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .btn-container .btn {
            width: calc(33.33% - 10px);
        }
        .table-container {
            margin-top: 20px;
        }
        .striped-table {
            background-color: #fff;
        }
        .striped-table th,
        .striped-table td {
            border-bottom: 1px solid #ddd;
            padding: 12px 15px;
        }
        .striped-table th {
            background-color: #f5f5f5;
            text-align: left;
            font-weight: bold;
        }
        .striped-table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .striped-table tbody tr:hover {
            background-color: #e0e0e0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="center-align">School Database</h2>
        <div class="btn-container">
            <a href="student.php" class="btn waves-effect waves-light">Student Reg</a>
            <a href="class_teacher.php" class="btn waves-effect waves-light">Teacher</a>
            <a href="student_record.php" class="btn waves-effect waves-light">View All Student Records</a>
        </div>
        <div class="table-container">
            <h4 class="center-align">Scorecard</h4>
            <table class="striped striped-table">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Class Name</th>
                        <th>Obtained Marks</th>
                        <th>Total Marks</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('../db/connection.php');
                    $sql = "SELECT s.name AS student_name, c.name AS class_name, sc.obt_marks, sc.total_marks 
                            FROM scorecard sc
                            INNER JOIN student s ON sc.student_id = s.id
                            INNER JOIN classes c ON sc.class_id = c.id";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['student_name'] . "</td>";
                        echo "<td>" . $row['class_name'] . "</td>";
                        echo "<td>" . $row['obt_marks'] . "</td>";
                        echo "<td>" . $row['total_marks'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Materialize JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
