<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ta_system";

$conn = mysqli_connect($servername, $username, $password, $dbname);
$msg = "";
if ( isset($_FILES["picpath"])) {
       //if there was an error uploading the file
        if ($_FILES["picpath"]["error"] > 0) {
              $msg = "Return Code: " . $_FILES["picpath"]["error"];
              
        } 
        else {
              $em = $_POST['email'];
              $pic = $_FILES['picpath'];
              $name=$pic['name'];
              $selectTA = "SELECT * FROM TA_records WHERE Email='$em'";
              
              $result = $conn->query($selectTA);
            
              //code for upload picture.
              if($result->num_rows>0){
                  $form_data = $_FILES['picpath']['tmp_name'];
                  $form_data_name = $_FILES['picpath']['name'];
                  $form_data_type = $_FILES['picpath']['type'];
                  $data = addslashes(fread(fopen($form_data, "r"), filesize($form_data)));
                 
                  mysqli_query($conn,"UPDATE ta_records SET imageType = '$form_data_type', Photo = '$data' WHERE Email='$em' ");
                  mysqli_close();
                  $msg = "Photo uploaded successfully for ".$em;
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