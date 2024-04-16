<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Guardian </title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/student_guardian.css" >
</head>
<body>
    <h2 class="center-align">Student Guardian</h2>
    <form action="student_guardian.php" method="post">
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
            <select id="guardian_id" name="guardian_id" required>
                <option value="" disabled selected>Select Guardian</option>
                <?php
                $sql = "SELECT ID, Name FROM guardian";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['ID'] . "'>" . $row['ID'] . " - " . $row['Name'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="input-field">
            <select id="guardian_type" name="guardian_type" required>
                <option value="" disabled selected>Select Guardian Type</option>
                <?php
                $sql = "SELECT ID, Type FROM guardian_type";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['ID'] . "'>" . $row['ID'] . " - " . $row['Type'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="center-align">
            <button class="btn waves-effect waves-light" type="submit" name="submit">Submit
                <i class="material-icons right">send</i>
            </button>
        </div>
    </form>
    <a href="student_class.php">
        <button class="btn waves-effect waves-light" type="submit" name="submit" style="margin-left: 45rem;" >Student class
        </button>
    </a>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $student_id = $_POST['student_id'];
        $guardian_id = $_POST['guardian_id'];
        $guardian_type_id = $_POST['guardian_type'];

        if (empty($student_id) || empty($guardian_id) || empty($guardian_type_id)) {
            echo "<script>alert('Please fill in all fields.');</script>";
        } else {
            $sql = "INSERT INTO student_guardian (student_id, guardian_id, guardian_type_id) VALUES ('$student_id', '$guardian_id', '$guardian_type_id')";
            if ($conn->query($sql) === TRUE) {
                header("Location: student_class.php");
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
