<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utopia - Home</title>
</head>

<body>
    <a href="../logout.php">Logout</a>
    <h1>Welcome, <? echo $_SESSION['username']; ?></h1>
    <p>What are you thinking?</p>
    <button>Create a report</button>
    <br>
    <button>Need insights</button>
    <br>
    <button>Trending reports for the day!</button>
    <br>
    <button>Check your report stats</button>
    <br>
</body>

</html>