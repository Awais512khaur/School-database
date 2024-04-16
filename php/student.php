<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Record Form</title>
    <!-- Materialize CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/button.css">
</head>
<body>
    <div class="container">
        <h2>Student Record </h2>
        <form action="student.php" method="post">
            <div class="row">
                <div class="input-field col s12">
                    <input id="name" type="text" name="name" class="validate" required>
                    <label for="name">Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="fathername" type="text" name="fathername" class="validate" required>
                    <label for="fathername">Father's Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="dob" type="date" name="dob" class="validate" required>
                    <label for="dob">Date of Birth</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="address" type="text" name="address" class="validate" required>
                    <label for="address">Address</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="edate" type="date" name="edate" class="validate" required>
                    <label for="edate">Enrollment Date</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <button class="btn waves-effect waves-light" type="submit" name="action" style="margin-left: 32%;" >Submit
                        <i class="material-icons right"  >send</i>
                    </button>
                </div>
            </div>
        </form>
        <a href="guardian.php">
        <button class="btn waves-effect waves-light" style="margin-left: 10rem;" >Guardian
        <i class="fa-solid fa-person" style="color: #f3f4f7;"></i>
        </button>
        </a>
    </div>
    <!-- Materialize JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://kit.fontawesome.com/0deb7a1be4.js" crossorigin="anonymous"></script>
</body>
</html>

<?php
include('../db/connection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $fathername = $_POST['fathername'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $edate = $_POST['edate'];
    $sql = "INSERT INTO student (Name, Father_name, Dob, address, edate)
            VALUES ('$name', '$fathername', '$dob', '$address', '$edate')";
    if ($conn->query($sql) === TRUE) {
        header("Location: guardian.php");
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

