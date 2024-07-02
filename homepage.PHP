
<?php
session_start();

$status = isset($_SESSION['status']) ? $_SESSION['status'] : null;
$navbar = '';

if ($status == 'Student') {
    $navbar = '
    <nav>
    <img class="logo" src="logo2.png">
        <ul>
        <li><a class="active" href="homepage.php">Home</a></li>
        <li><a href="about1.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="studentrec.php">Record</a></li>
        <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>';
} elseif ($status == 'Staff') {
    $navbar = '
    <nav>
    <img class="logo" src="logo2.png">
        <ul>
        <li><a class="active" href="homepage.php">Home</a></li>
        <li><a href="about1.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="insert.php">New Record</a></li>
        <li><a href="records.php">View Record</a></li>
        <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>';
} else {
    $navbar = '
    <nav>
    <img class="logo" src="logo2.png">
        <ul>
        <li><a class="active" href="homepage.php">Home</a></li>
        <li><a href="about1.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="signup.php">Sign Up</a></li>
        </ul>
    </nav>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KK5 E-PARCEL</title>
    <link rel="stylesheet"  href="homepage.css">
    <style>
nav{
  height: 80px;
    width: 100%;
    background: rgba(0, 0, 0, 0.4);
}
nav ul {
    float: right;
    margin-right: 20px;
}

nav ul li {
    list-style: none;
    margin: 0 8px;
    display: inline-block;
    line-height: 80px;
}

nav ul li a {
    font-size: 20px;
	font-family: 'Roboto', sans-serif;
	color: white;
	padding: 6px 13px;
	text-decoration: none;
	transition: .4s;
}
nav ul li a.active,
nav ul li a:hover {
    background: red;
	border-radius: 2px;
}
.center .buttons{
	margin: 35px 280px;
}
.buttons a{
    display: inline-block;
    height: 50px;
    width: 150px;
    font-size: 18px;
    font-weight: 600;
    color: #ffb3b3;
    background: red;
    outline: none;
    cursor: pointer;
    border: 1px solid #cc0000;
    border-radius: 25px;
    transition: .4s;
    text-decoration: none;
    text-align: center;
    line-height: 50px; /* Ensure the text is vertically centered */
}
.buttons a:hover{
    background: #cc0000;
}
    </style>
</head>
<body>
    <div class="wrapper">
        <div id="navbar">
            <?php echo $navbar; ?>
        </div>
        <div class="center">
            <h1>Welcome To E-Parcel</h1>
            <h2>Kolej Kediaman 5</h2>
            <div class="buttons">
                <a href="about1.PHP">Explore More</a>
                <a href="contact.php" class="btn">Contact Us</a>
            </div>
        </div>
    </div>
</body>
</html>
