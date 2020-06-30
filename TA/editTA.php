<?php
session_start();

$servername = "tethys.cse.buffalo.edu:3306";
$username = "ashishav";
$password = "50337024";
$dbname = "cse442_542_2020_summer_teamh_db";


$conn = mysqli_connect($servername, $username, $password, $dbname);

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$course = $_POST['course'];
$em = $_SESSION['email'];

$msg = "";
if ( isset($_FILES["picpath"])) {
       //if there was an error uploading the file
        if ($_FILES["picpath"]["error"] > 0) {
              //mysqli_query($conn,"UPDATE TA_records SET First_Name = '$firstname', Last_Name = '$lastname' WHERE Email='$em'");
              $stmt = $conn->prepare("UPDATE TA_records SET First_Name = '$firstname', Last_Name = '$lastname' WHERE Email= ?");
              $stmt->bind_param("s", $email);
              $email = $em;
              $stmt->execute();

              $msg = "Details updated successfully!";
        }
        else {
                  $form_data = $_FILES['picpath']['tmp_name'];
                  $form_data_type = $_FILES['picpath']['type'];

                  $data = addslashes(fread(fopen($form_data, "r"), filesize($form_data)));

                  mysqli_query($conn,"UPDATE TA_records SET imageType = '$form_data_type', Photo ='$data', First_Name = '$firstname', Last_Name = '$lastname' WHERE Email='$em'");

                  $stmt = $conn->prepare("UPDATE TA_records SET imageType = '$form_data_type', Photo ='$data', First_Name = '$firstname', Last_Name = '$lastname' WHERE Email= ?";
                  $stmt->bind_param("s", $email);
                  $email = $em;
                  $stmt->execute();

                  mysqli_close();
                  $msg = "Details updated successfully!";

              }  	
              
}else {
     $msg = "No File selected";
}
$_SESSION['message'] =  $msg;

header("Location:./TA_dashboard.php");

$conn = null;
?>