<!DOCTYPE html>
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ta_system";

$conn = mysqli_connect($servername, $username, $password, $dbname);
$msg = "";

$em = $_POST['email'];
$fn = $_POST['first_name'];
$ln = $_POST['last_name'];
$psw = $_POST['password'];

$selectTA = "SELECT * FROM ta_records WHERE Email='$em'";               
$result = $conn->query($selectTA);
$tmpfile=$pic['tmp_name'];

if($result->num_rows>0){
      mysqli_query($conn,"UPDATE TA_records SET First Name='$fn' Last Name='ln' WHERE Email='$em' ");
      mysqli_query($conn,"UPDATE user_data SET password='$psw' WHERE Email='$em' ");
      mysqli_close(); 
      $msg = "succeed!";    
  }else{
        $msg = "Sorry! You are not authorized to signup as a TA. Please contact your professor for the details.";
        }

$_SESSION['message'] =  $msg;
header("Location:./faculty_dashboard.php");
$conn = null;
?>