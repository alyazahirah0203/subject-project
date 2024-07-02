<?php
session_start();

$status = isset($_SESSION['status']) ? $_SESSION['status'] : null;
$navbar = '';

if ($status == 'Student') {
    $navbar = '
    <nav>
        <img class="logo" src="logo2.png">
        <ul>
            <li><a href="homepage.php">Home</a></li>
            <li><a href="about1.PHP">About</a></li>
            <li><a class="active" href="contact.php">Contact</a></li>
            <li><a href="studentrec.php">Record</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>';
} elseif ($status == 'Staff') {
    $navbar = '
    <nav>
        <img class="logo" src="logo2.png">
        <ul>
            <li><a href="homepage.php">Home</a></li>
            <li><a href="about1.PHP">About</a></li>
            <li><a class="active" href="contact.php">Contact</a></li>
            <li><a href="insert.php">New Record</a></li>
            <li><a href="records.php">View Record</a></li>
            <li><a href="login.php"> Sign Up</a></li>
        </ul>
    </nav>';
} else {
    $navbar = '
    <nav>
        <img class="logo" src="logo2.png">
        <ul>
            <li><a href="homepage.php">Home</a></li>
            <li><a href="about1.php">About</a></li>
            <li><a class="active"href="contact.php">Contact</a></li>
            <li><a href="login.php">Sign Up</a></li>
        </ul>
    </nav>';
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KK5 E-PARCEL</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="contact.css">
    <style>
        nav {
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
        .center .buttons {
            margin: 35px 280px;
        }
        .buttons a {
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
        .buttons a:hover {
            background: #cc0000;
        }
    </style>
</head>
<body>
    <div class="wrapper">
    <div id="navbar">
            <?php echo $navbar; ?>
        </div>

    <div class="section">
        <div class="title">
            <h1>Contact Us</h1>
        </div>
        <div class="services">
            <div class="card">
                <div class="icon">
                    <i class="fas fa-location"> </i>
                </div>
                <h2>Address</h2>
                <p> Pusat Aktiviti Pelajar Universiti Malaysia Pahang Al-Sultan Abdullah, 26600 Pekan, Pahang</p>
                <a href="#" class="button"></a>
            </div>
            <div class="card">
                <div class="icon">
                    <i class="fas fa-phone"> </i>
                </div>
                <h2>Phone</h2>
                <p>+03 61856961</p>
                <p>+60 11 52414567</p>
               
            </div>
            <div class="card">
                <div class="icon">
                    <i class="fas fa-envelope"> </i>
                </div>
                <h2>Email</h2>
                <p>pusatparcelkk5@umpsa.edu.my</p>
                <p></p>
                <p></p>
                <a href="#" class="button"></a>
            </div>

            <!-- start sini untuk google maps-->
        </div>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.0915516466656!2d101.69182971426684!3d3.1414467549187587!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc360d1e65b29d%3A0xf4bd7d621e7f65c7!2sNational%20Museum%20%28Muzium%20Negara%29!5e0!3m2!1sen!2smy!4v1649851592005!5m2!1sen!2smy" 
            width=60% height="150" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
    
</body>
</html>