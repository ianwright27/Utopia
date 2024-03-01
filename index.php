<?php

if (isset($_REQUEST['logout'])) {
    $bannermsg = "We're sorry to see you leave. Feel free to log in anytime.";
    echo "<div class='banner'>" . $bannermsg . "</div>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utopia</title>
</head>

<body>
    <h1>Welcome to a great revolution</h1>
    <p>A leap to a great society, driven by integrity, honesty, honor, respect.</p>
    <p>Economic, political and educational systems functioning in tandem to ensure all the people get to benefit equally. </p>
    <a href="login.php">Login</a>
    <br>
    Don't have an account? <a href="register.php">Click here</a>.
</body>

</html>