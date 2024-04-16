<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Teacher</title>
    <!-- Materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f0;
            padding-top: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h4 class="center-align">Assign Class Teacher</h4>
        <form method="post" action="assign_teacher.php" >
            <div class="input-field">
            <select id="class_id" name="class_id" required>
            <?php include('../db/connection.php'); ?>
                <option value="" disabled selected>Select Class</option>
                <?php
                $sql = "SELECT ID, Name FROM classes";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['ID'] . "'>" . $row['ID'] . " - " . $row['Name'] . "</option>";
                }
                ?>
            </select>
                <label>Select Class</label>
            </div>
            <div class="input-field">
                <input type="text" id="name" name="name" >
                <label for="name">Teacher Name</label>
            </div>
            <div class="input-field">
                <input type="text" id="address" name="address" >
                <label for="address">Address</label>
            </div>
            <div class="input-field">
                <input type="text" id="phone" name="phone" >
                <label for="phone">Phone</label>
            </div>
            <div class="center-align">
                <button class="btn waves-effect waves-light" type="submit">Add Teacher</button>
            </div>
        </form>
    </div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $class_id = $_POST['class_id'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        if (empty($class_id) || empty($name) || empty($address) || empty($phone)) {
            echo "<script>alert('Please fill in all fields.');</script>";
        } else {
            $sql = "INSERT INTO class_teacher (class_id, Name, Address, Phone) VALUES ('$class_id', '$name', '$address', '$phone')";
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
