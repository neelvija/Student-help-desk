<!DOCTYPE html>
<?php
session_start();
$servername = "tethys.cse.buffalo.edu:3306";
$username = "ashishav";
$password = "50337024";
$dbname = "cse442_542_2020_summer_teamh_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);
$msg = "";
if ( isset($_FILES["picpath"])) {
       //if there was an error uploading the file
        if ($_FILES["picpath"]["error"] > 0) {
              $msg = "Return Code: " . $_FILES["picpath"]["error"];
        } else {
              $em = $_POST['email'];
              $pic = $_FILES['picpath'];
              $name=$pic['name'];
              $selectTA = "SELECT * FROM TA_records WHERE Email='$em'";
              
              $result = $conn->query($selectTA);

              if($result->num_rows>0){
                  $tmpfile=$pic['tmp_name'];
                  if(!file_exists("upload/".$name))
                  { 
                   move_uploaded_file($tmpfile,"upload/".$name);

                  mysqli_query($conn,"UPDATE TA_records SET Photo='upload/$name' WHERE Email='$em' ");
                  mysqli_close();
                  $msg = "Photo successfully uploaded";
                  } else {
                       $msg = "Photo already exists!";
                  }
              } else{
                  $msg = "User id you entered is not a TA";
              }  	
              }
} else {
     $msg = "No File selected";
}
$_SESSION['message'] =  $msg;
header("Location:./faculty_dashboard.php");
$conn = null;
?>