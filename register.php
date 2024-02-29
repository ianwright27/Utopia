<?php
require_once 'db.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate form data (you can add more validation if needed)

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into the database
    $stmt = $conn->prepare("INSERT INTO users (fname, lname, email, password_) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $fname, $lname, $email, $hashed_password);

    if ($stmt->execute()) {
        // Registration successful
        echo "Registration successful!";
    } else {
        // Registration failed
        echo "Error: " . $conn->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utopia - Register</title>
</head>

<body>
    <h2>Register</h2>
    <form action="register.php" method="POST">
        <label for="fname">First Name</label><br>
        <input type="text" name="fname"> <br>
        <br>

        <label for="lname">Last Name</label><br>
        <input type="text" name="lname"> <br>
        <br>

        <label for="email">Email</label><br>
        <input type="text" name="email"> <br>
        <br>

        <label for="password1">Password</label><br>
        <input type="password" name="password1" id="pass1"> <br>
        <br>

        <label for="password">Confirm Password</label><br>
        <input type="password" name="password" id="pass2"> <br>
        <br>

        <input type="submit" value="Register!">
    </form>
</body>

</html>