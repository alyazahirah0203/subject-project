<?php
$servername="localhost";
$username="root";
$password="";
$database="parcel";
$conn=mysqli_connect($servername, $username, $password, $database);

if($conn){

}
else{
    die("error".mysqli_connect_error());
}
?>