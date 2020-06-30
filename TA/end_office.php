<?php
session_start();

$servername = "tethys.cse.buffalo.edu:3306";
$username = "ashishav";
$password = "50337024";
$dbname = "cse442_542_2020_summer_teamh_db";

$em = $_SESSION['email'];

$conn = mysqli_connect($servername, $username, $password, $dbname);
$que = "UPDATE TA_records SET Is_available = 'false',Office_Location = '',course_id = '' where Email = '$em' ";
//$jugy = "SELECT Is_available from TA_records where Email='$em'";
//$result2 = mysqli_query($conn,$jugy);

$stmt = $conn->prepare("SELECT Is_available from TA_records where Email= ?");
$stmt->bind_param("s", $email;);
$email = $em;
$stmt->execute();
$result = $stmt->get_result();

while($row = $result->fetch_assoc())
{
  $flag = $row['Is_available'];
}

if($flag === "false"){
	$_SESSION["message"] =  "Office hours has already ended!";
}else{
	$result = mysqli_query($conn,$que);
	$_SESSION["message"] =  "Office hours ended!";
}

header("Location:./TA_dashboard.php");
?>