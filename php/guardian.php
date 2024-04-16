<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardian</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/button.css">
</head>
<body>
    <div class="container">
        <h2>Guardian</h2>
        <form action="guardian.php" method="post" class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <input id="name" type="text" name="name" class="validate" required>
                    <label for="name">Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="phone" type="number" name="phone" class="validate" required>
                    <label for="phone">Phone</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="email" type="email" name="email" class="validate" required>
                    <label for="email">Email</label>
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
                    <button class="btn waves-effect waves-light" type="submit" name="action" style="margin-left: 9rem;" >Submit
                        <i class="material-icons right" style="margin-left: 68px;" >send</i>
                    </button>
                </div>
            </div>
        </form>
        <a href="student_guardian.php">
            <button class="btn waves-effect waves-light" type="submit" name="action" style="margin-left: 9rem;" >Student Guardian
            <i class="fa-solid fa-person" style="color: #f3f4f7;"></i>
            </button>
        </a>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://kit.fontawesome.com/0deb7a1be4.js" crossorigin="anonymous"></script>
</body>
</html>
<?php
include('../db/connection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $sql = "INSERT INTO guardian (Name, Phone, Email, Address)
            VALUES ('$name', '$phone', '$email', '$address')";
    if ($conn->query($sql) === TRUE) {
        header("Location: student_guardian.php");
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

