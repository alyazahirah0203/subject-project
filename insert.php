<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'dbconnection.php';

    // Ensure all necessary fields are set
    if (!isset($_POST["stdname"], $_POST["stdphone"], $_POST["stdmatric"], $_POST["parcelnum"], $_POST["pdate"], $_POST["courier"], $_POST["rack"])) {
        die("All fields are required.");
    }

    // Student details
    $stdname = $_POST["stdname"];
    $stdphone = $_POST["stdphone"];
    $stdmatric = $_POST["stdmatric"];

    // Parcel details
    $parcelnum = $_POST["parcelnum"];
    $pdate = $_POST["pdate"];
    $courier = $_POST["courier"];
    $rack = $_POST["rack"];

    // Start a transaction
    mysqli_begin_transaction($conn);

    try {
        // Insert student details
        $sql_student = "INSERT INTO `students` (`stdname`, `stdphone`, `stdmatric`) VALUES (?, ?, ?)";
        $stmt_student = mysqli_prepare($conn, $sql_student);
        mysqli_stmt_bind_param($stmt_student, "sss", $stdname, $stdphone, $stdmatric);
        mysqli_stmt_execute($stmt_student);

        // Get the inserted student ID
        $stdID = mysqli_insert_id($conn);

        // Insert parcel details with the student ID
        $sql_parcel = "INSERT INTO `parcels` (`parcelnum`, `pdate`, `courier`, `rack`, `status`, `stdID`) VALUES (?, ?, ?, ?, 1, ?)";
        $stmt_parcel = mysqli_prepare($conn, $sql_parcel);
        mysqli_stmt_bind_param($stmt_parcel, "ssssi", $parcelnum, $pdate, $courier, $rack, $stdID);
        mysqli_stmt_execute($stmt_parcel);

        // Commit transaction
        mysqli_commit($conn);

        header("Location:records.php");
    } catch (Exception $e) {
        // Rollback transaction on error
        mysqli_rollback($conn);
        echo "Error inserting records: " . $e->getMessage();
    }

       
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KK5 E-PARCEL</title>
    <style>@import url('https://fonts.googleapis.com/css?family=Roboto:700&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: sans-serif;
}

body{
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    width: 100%;
    background: white;
    background-size: cover;
}
.wrapper{
    width: 100%;
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
.container{
    max-width: 650px;
    padding: 28px;
    margin-top: 50px;
    margin: 0 28px;
    margin-top: 50px;
    box-shadow: 0 15px 20px #ABB2B9;
}


h1{
    font-weight: 600;
    text-align: left;
    color: red;
    padding-top: 8px;
    margin-top: 50px;
    margin-left: 100px;
}
h2{
    font-size: 20px;
    font-weight: 600;
    text-align: left;
    color: black;
    padding-bottom: 8px;
    border-bottom:  1px solid silver;
}

.content{
    display:flex;
    flex-wrap: wrap;
    justify-content: space-between;
    padding: 20px 0;
}

.input-box{
    display: flex;
    flex-wrap: wrap;
    width: 50%;
    padding-bottom: 0px;
}
.input-b{
    display: flex;
    flex-wrap: wrap;
    width: 100%;
    padding-bottom: 10px;
    justify-content: space-between;
    padding: 20px 0;
}

.input-b input{
    height: 40px;
    width: 100%;
    padding: 0 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    outline: none;
}

.input-box input:is(:focus, :valid){
    box-shadow:  0 3px 6px rgba (0,0,0,0.2);
}


.input-box input{
    height: 40px;
    width: 95%;
    padding: 0 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    outline: none;
}

.input-box input:is(:focus, :valid){
    box-shadow:  0 3px 6px rgba (0,0,0,0.2);
}
.input-b label{
    justify-content: end;
}

.container1{
    margin-top: 10px;
    max-width: 650px;
    padding: 28px;
    margin: 0 28px;
    margin-top: 40px;
    box-shadow: 0 15px 20px #ABB2B9;
}

.content1{
    display:flex;
    flex-wrap: wrap;
    justify-content: space-between;
    padding: 20px 0;
}
.input-parcel{
    display: flex;
    flex-wrap: wrap;
    width: 25%;
    padding-bottom: 0px;
}

.input-p{
    display: flex;
    flex-wrap: wrap;
    width: 100%;
    padding-bottom: 10px;
    justify-content: space-between;
    padding: 20px 0;
}

.input-p input{
    height: 40px;
    width: 100%;
    padding: 0 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    outline: none;
}

.input-box input:is(:focus, :valid){
    box-shadow:  0 3px 6px rgba (0,0,0,0.2);
}


.input-parcel input{
    height: 40px;
    width: 95%;
    padding: 0 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    outline: none;
}

.input-parcel input:is(:focus, :valid){
    box-shadow:  0 3px 6px rgba (0,0,0,0.2);
}
.input-p label{
    justify-content: end;
}
select{
        height: 40px;
        width: 95%;
        padding: 0 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        outline: none;
    }
    button{
        width: 330px;
        outline: none;
        border: none;
        font-size:  1rem;
        font-weight:  500;
        padding: 14px 0;
        border-radius: 10px;
        margin: 25px 0;
        color: #fff;
        cursor: pointer;
        background: #cc0000;
        transform: 0.2s ease;
        text-align: center;
        margin-left: 1115px;
        margin-top: 55px;
    }
    
    button:hover{
        background: red;
    }
    
   
    .container-wrapper {
        display: flex;
        align-items: center;
        margin-top: 0px;
        margin-left: 60px;
    }
    
    .container, .container1 {
        flex: 0 0 calc(100% - 14px); /* Adjust the width based on your preference */
    }</style>
</head>
<body>
    <div class="wrapper">
        <nav class="navbar">
            <img class="logo" src="logo2.png">
            <ul>
                <li><a href="homepage.PHP">Home</a></li>
                <li><a href="about1.PHP">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a class="active" href="insert.php">New Record</a></li>
                <li><a href="records.php">View Record</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </nav>
<H1>Insert New Record</H1>
    <div class="container-wrapper">
    <div class="container">
        <form action="insert.php" method="post">
            <h2>Student Details</h2>
            
                <div class="input-b">
                    <label for="stdname">Name</label>
                    <input type="text" placeholder="Enter student name" name="stdname" id="stdname" required>
                </div>
                <div class="content">
                <div class="input-box">
                    <label for="stdphone">Phone Number</label>
                    <input type="tel" placeholder="Phone Number" name="stdphone" id="stdphone" required>
                </div>
                <div class="input-box">
                    <label for="stdmatric">Matric ID</label>
                    <input type="text" placeholder="Matric ID" name="stdmatric" id="stdmatric" required>
                </div>
            </div>
        
    </div>

    <div class="container1">
        
            <h2>Parcel Details</h2>
            <div class="input-p">
                <label for="parcelid">Parcel ID</label>
                <input type="text" placeholder="Enter parcel ID" name="parcelnum" id="parcelnum" required>
            </div>

            <div class="content1">
            <div class="input-parcel">
                <label for="date">Arrival Date</label>
                <input type="date" id="arrivaldate" name="pdate" id="pdate" required>
            </div>
<br>
            <div class="input-parcel">
                <label for="courier">  Courier</label>
                <input type="text" placeholder="Courier" name="courier" id="courier" required>
            </div>

            <div class="input-parcel">
            <label for="rack">Rack</label>
    <select id="rack" name="rack"> 
        <?php 
        $racks = array("A", "B", "C"); 
        foreach ($racks as $rack) { 
            echo "<option value='" . $rack . "'>" . $rack . "</option>"; 
        } 
        ?> 
    </select>
                </div>
            </div></div>
        
    
</div>
    <button type="submit">Submit</button>
</form>
</body>
</html>