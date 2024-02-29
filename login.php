<?php
require_once 'db.php';
session_start();

if (isset($_REQUEST['success'])) {
    echo "<p>Registration successful! You can now login.</p>";
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user from the database
    $stmt = $conn->prepare("SELECT id, email, password_ FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $email, $hashed_password);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashed_password)) {
            // Password is correct, set session variables
            $_SESSION['id'] = $id;
            $_SESSION['email'] = $email;

            // Redirect to dashboard or homepage
            header("Location: home/");
            exit();
        } else {
            // Password is incorrect
            $error = "Invalid username/email or password!";
        }
    } else {
        // User not found
        $error = "Invalid username/email or password!";
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
    <title>Utopia - Login</title>
</head>

<body>
    <h2>Login</h2>
    <form action="login.php" method="POST">
        <label for="username">Email</label>
        <input type="text" name="email"> <br>
        <br>

        <label for="password">Password</label>
        <input type="password" name="password"> <br>
        <br>

        <input type="submit" value="Login">
        <br>

        <br>
        <a href="forgot/">Forgot your password? Click here.</a>
    </form>
</body>

</html>