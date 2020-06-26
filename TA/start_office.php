<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ta_system";
$em = $_SESSION['email'];

$conn = mysqli_connect($servername, $username, $password, $dbname);
$que = "UPDATE ta_records SET Is_available = 'Online' where Email = '$em' ";


mysqli_query($conn,$que);

echo "Office hour Start!"
?>