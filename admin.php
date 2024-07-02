<?php
session_start();
if (!isset($_SESSION['name'])) {
    // Redirect to login page if the session is not set
    header("Location: login.php");
    exit();
}
$userNameDisplay = $_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KK5 E-PARCEL</title>
    <link rel="stylesheet"  href="admin.css">
</head>
<body>
    <img class="logo" src="logo1.png">
    <div class="container">
    <div><h2>Welcome back&nbsp;<span id="name"><?php echo htmlspecialchars($userNameDisplay); ?></span></h2></div>
    <div><a href="insert.php"><button type="submit">New record</button></a></div>
    <div><a href="records.php"><button type="submit">View Record</button></a></div>
</div>
</body>
</html>