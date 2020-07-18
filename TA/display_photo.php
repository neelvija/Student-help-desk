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

$result = mysqli_query($con,"SELECT Photo, imageType FROM TA_records WHERE Email='$em'");

while($row = mysqli_fetch_array($result))
{

header("Content-type: " . $row["imageType"]);
echo $row["Photo"];
  
}

?>