<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scorecard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/student_guardian.css" >
</head>
<body>
    <h2 class="center-align">Student Score</h2>
    <form action="student_score.php" method="post">
        <div class="input-field" >
            <select id="student_id" name="student_id" required style="display: none;" >
                <option value="" disabled selected>Select Student</option>
                <?php
                include('../db/connection.php');
                $sql = "SELECT ID, Name FROM student";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['ID'] . "'>" . $row['ID'] . " - " . $row['Name'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="input-field">
            <select id="class_id" name="class_id" required>
                <option value="" disabled selected>Select Class</option>
                <?php
                $sql = "SELECT ID, Name FROM classes";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['ID'] . "'>" . $row['ID'] . " - " . $row['Name'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input type="number" id="obt_marks" name="obt_marks" placeholder="Enter Obtained Marks" >
                <label for="s_date">Obtain Marks</label>
            </div>
            <div class="input-field col s6">
                <input type="number" id="total_marks" name="total_marks"  placeholder="Enter Total Marks" >
                <label for="e_date">Total Marks</label>
            </div>
        </div>
        <div class="center-align">
            <button class="btn waves-effect waves-light" type="submit" name="submit">Submit
                <i class="material-icons right">send</i>
            </button>
        </div>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $student_id = $_POST['student_id'];
        $class_id = $_POST['class_id'];
        $obt_marks = $_POST['obt_marks'];
        $total_marks = $_POST['total_marks'];
        if (empty($student_id) || empty($class_id) || empty($obt_marks) || empty($total_marks)) {
            echo "<script>alert('Please fill in all fields.');</script>";
        } else {
            $sql = "INSERT INTO scorecard (student_id, class_id, obt_marks, total_marks) VALUES ('$student_id', '$class_id', '$obt_marks', '$total_marks')";
            if ($conn->query($sql) === TRUE) {
                echo '<script>alert("New record created successfully");</script>';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        $conn->close();
    }
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
    </script>
</body>
</html>
