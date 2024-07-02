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
            <li><a  href="homepage.php">Home</a></li>
            <li><a class="active" href="about1.PHP">About</a></li>
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
            <li><a  href="homepage.php">Home</a></li>
            <li><a class="active" href="about1.PHP">About</a></li>
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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="about1.css">
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

<h2>About</h2>
<br>
<br>
<div class="card">
   
    <p>KK5 Parcel Pickup Management System known as E-Parcel is a platform to facilitate users including staff and students in UMPSA. This platform offers an efficient 
      platform for staff to keep records about parcel and student. Student also can use this platform to keep on track about their parcel arrival status.
    </p>
</div>

<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img src="img_nature_wide.jpg" style="width:100%">
  <div class="text">Caption Text</div>
</div>

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img src="img_snow_wide.jpg" style="width:100%">
  <div class="text">Caption Two</div>
</div>

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img src="img_mountains_wide.jpg" style="width:100%">
  <div class="text">Caption Three</div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
</div>

<script>
    let slideIndex = 0;
    showSlides();
    
    function showSlides() {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
      }
      slideIndex++;
      if (slideIndex > slides.length) {slideIndex = 1}    
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " active";
      setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
    </script>
</body>
</html>