<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include 'dbconnection.php';

    // Validate and sanitize input
    $matricID = isset($_POST['matricID']) ? htmlspecialchars(trim($_POST['matricID'])) : '';
    $password = isset($_POST['password']) ? htmlspecialchars(trim($_POST['password'])) : '';

    if (!empty($matricID) && !empty($password)) {

        // Prepare SQL statement to prevent SQL injection
        $sql = "SELECT * FROM Users WHERE matricID=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $matricID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result) {
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();

                // After successful password verification
                if (password_verify($password, $row['password'])) {
                    session_start(); // Start the session
                    $_SESSION['name'] = $row['name']; // Store the user name
                    $_SESSION['matricID'] = $row['matricID']; // Store the user matricID
                    $_SESSION['status'] = $row['status']; // Store the user status
                    $_SESSION['ID'] = $row['ID']; // Store the user ID

                    // Check UserStatus and redirect accordingly
                    switch ($row['status']) {
                        case "Staff": // Admin
                            header("Location: admin.php");
                            exit();
                        case "Student": // User
                            header("Location: studentrec.php");
                            exit();
                        default:
                            header("Location: signup.php");
                            exit();
                    }
                } else {
                    $showError = "Invalid matricID or password";
                }
            } else {
                $showError = "Invalid matricID or password";
            }
        } else {
            // Debugging: Print SQL error if any
            echo "Error: " . $conn->error;
        }
    } else {
        $showError = "Please enter both matricID and password.";
    }
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
    <link rel="stylesheet" href="loginstyle.css">
    <style>
        *{
    padding: 0;
    margin: 0;
}

.wrapper{
    background: url(bg1.jpg) no-repeat;
    background-size: cover;
    height: 100vh;
}

.navbar{
    height: 80px;
    width: 100%;
    background: rgba(0, 0, 0, 0.4);
}

.logo{
    width: 140px;
    height: auto;
    padding: 20px 100px;
    margin-top: -50px;
    margin-left: -20px;
}
.navbar ul{
    float: right;
    margin-right: 20px;
}

.navbar ul li{
    list-style: none;
    margin: 0 8px;
    display: inline-block;
    line-height: 80px;
}

.navbar ul li a{
	font-size: 20px;
	font-family: 'Roboto', sans-serif;
    font-style: bold;
	color: white;
	padding: 6px 13px;
	text-decoration: none;
	transition: .4s;
}
.navbar ul li a.active,
.navbar ul li a:hover{
	background: red;
	border-radius: 2px;
}
.wrapper .center{
	position: absolute;
	left: 50%;
	top: 55%;
	transform: translate(-50%, -50%);
	font-family: sans-serif;
	user-select: none;
}
.form-popup{
    position: fixed;
    top: 50%;
    left: 50%;
    max-width: 720px;
    width: 100%;
    background: #fff;
    border: 2px solid #fff;
    transform: translate(-50%, -50%);
}

.form-popup .close-btn{
    position: absolute;
    top: 12px;
}

.form-popup .form-box{
    display: flex;
}

.form-box .form-details{
    max-width: 330px;
    width: 100%;
    color: white;
    display:flex;
    text-align: center;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background: #A8A8A8;  /*kalau nak letak gambar, boleh url("img.jpg") */
    background-size: cover;
    background-position: center;
}

.form-box h2{
    text-align: center;
    margin-bottom:  30px;
    font-family: sans-serif;
    font-size: 30px;
}

.form-box .form-content{
    width: 100%;
    padding: 35px;
}

form .input-field{
    height: 50px;
    width: 90%;
    margin-top: 20px;
    margin-bottom: 5px;
    position: relative;
}

form .input-field input{
    width: 100%;
    height: 100%;
    outline: none;
    padding: 0 15px;
    font-size: 0.95rem;
    border-radius: 3px;
    border: 1px solid #717171;
}

.input-field input:focus{
    border-color: #cc0000;
}

.input-field input:is(:focus, :valid){
    padding: 4px 15px 0;
}

form .input-field label{
    position: absolute;
    top: 50%;
    left: 15px;
    color: #717171;
    pointer-events: none;
    transform: translateY(-50%);
    transition: 0.2s ease;
}

.input-field input:is(:focus, :valid) ~ label{
    color: #cc0000;
    font-size: 0.75rem;
    transform: translateY(-120%);
}

.form-box a{
    color: #cc0000;
    text-decoration: none;
}

.form-box a:hover{
    text-decoration: underline;
}

form button{
    width: 96.5%;
    outline: none;
    border: none;
    font-size:  1rem;
    font-weight:  500;
    padding: 14px 0;
    border-radius: 3px;
    margin: 25px 0;
    color: #fff;
    cursor: pointer;
    background: #cc0000;
    transform: 0.2s ease;
}

form button:hover{
    background: red;
}

.form-box .bottom-link{
    text-align: center;
}


    </style>
</head>
<body>
    <div class="wrapper">
    <nav class="navbar">
        <img class="logo" src="logo2.png">
        <ul>
            <li><a href="homepage.php">Home</a></li>
            <li><a href="about1.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a class="active" href="signup.php">Sign In</a></li>
        </ul>
    </nav>
</div>
<!--LOGIN-->
<div class="form-popup">
   <div class="form-box">
    <div class="form-details">
        <h2>Welcome</h2>
        <p>Please log in to stay connected with us</p>
    </div>
    <div class="form-content">
        <h2>LOG IN</h2>
        <form action="login.php" method="POST">
            <div class="input-field">
                <input type="text" name="matricID" required>
                <label>Matric ID</label>
            </div>
            <div class="input-field">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <button type="submit">Log In</button>
        </form>
        <div class="bottom-link">
            Don't have an account?
            <a href="signup.php">Sign Up</a>
        </div>
    </div>
   </div>
</div>

</body>
</html>
