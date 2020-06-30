<?php 
session_start();
      $em = $_SESSION['email'];
$servername = "tethys.cse.buffalo.edu:3306";
$username = "ashishav";
$password = "50337024";
$dbname = "cse442_542_2020_summer_teamh_db";

$con = mysqli_connect($servername, $username, $password, $dbname);

if (mysqli_connect_errno())
{
    echo "Connect fail: " . mysqli_connect_error();
}

//$result = mysqli_query($con,"SELECT Photo, imageType FROM TA_records WHERE Email='$em'");

$stmt = $conn->prepare("SELECT Photo, imageType FROM TA_records WHERE Email=?");
$stmt->bind_param("s", $email);
$email = $em;

$stmt->execute();
$result = $stmt->get_result();

while($row = $result->fetch_assoc())
{

header("Content-type: " . $row["imageType"]);
echo $row["Photo"];
  
}

?>