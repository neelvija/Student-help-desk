<?php 
session_start();
      $em = $_SESSION['email'];
$con=mysqli_connect("localhost","root","","ta_system");
// 检测连接
if (mysqli_connect_errno())
{
    echo "Connect fail: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT Photo, imageType FROM ta_records WHERE Email='$em'");

while($row = mysqli_fetch_array($result))
{

header("Content-type: " . $row["imageType"]);
echo $row["Photo"];
  
}

?>