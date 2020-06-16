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
//echo $em,$fn,$ln,$psw;

$selectTA = "SELECT * FROM ta_records WHERE Email='$em'";               
$result = $conn->query($selectTA);

if($result->num_rows>0){
      mysqli_query($conn,"UPDATE ta_records SET First_Name='$fn', Last_Name='$ln' WHERE Email='$em' ");
      mysqli_query($conn,"UPDATE user_data SET first_name='$fn', last_name='$ln', password='$psw' WHERE email='$em' ");
      echo "<script>alert('Successful.');
    	window.location.href='{$_SERVER['HTTP_REFERER']}'</script>";
         
  }else{
        //$msg = "Sorry! You are not authorized to signup as a TA. Please contact your professor for the details.";
        echo "<script>alert('Sorry! You are not authorized to signup as a TA. Please contact your professor for the details.');
    	window.location.href='{$_SERVER['HTTP_REFERER']}'</script>";
        }

$conn = null;
?>
