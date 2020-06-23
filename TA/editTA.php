<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ta_system";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$course = $_POST['course'];
$em = $_SESSION['email'];
//echo '<script type="text/javascript">alert("' .$_POST['lastname']. '");</script>';


$msg = "";
if ( isset($_FILES["picpath"])) {
       //if there was an error uploading the file
        if ($_FILES["picpath"]["error"] > 0) {
              $msg = "Return Code: " . $_FILES["picpath"]["error"];
              
        } 
        else {

                  $form_data = $_FILES['picpath']['tmp_name'];
                  $form_data_type = $_FILES['picpath']['type'];

                  $data = addslashes(fread(fopen($form_data, "r"), filesize($form_data)));

                  mysqli_query($conn,"UPDATE ta_records SET imageType = '$form_data_type', Photo ='$data', First_Name = '$firstname', Last_Name = '$lastname' WHERE Email='$em'");
                  mysqli_query($conn,"UPDATE faculty_course_mapping_table SET course_name = '$course' WHERE instructor_email='$em' ");
                  mysqli_close();
                  $msg = "set successfully!";

              }  	
              
}else {
     $msg = "No File selected";
}
$_SESSION['message'] =  $msg;

header("Location:./TA_dashboard.php");

$conn = null;
?>