<!DOCTYPE html>
<?php
session_start();
$servername = "tethys.cse.buffalo.edu:3306";
$username = "ashishav";
$password = "50337024";
$dbname = "cse442_542_2020_summer_teamh_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ( isset($_FILES["picpath"])) {
       //if there was an error uploading the file
        if ($_FILES["picpath"]["error"] > 0) {
              echo '<script type="text/javascript">alert("Return Code: " '. $_FILES["picpath"]["error"].')</script>';
        } else {
              $handle = fopen($_FILES['picpath']['tmp_name'], "r");
              $headers = fgetcsv($handle, ",");

              $success_count = 0;
              $failure_count = 0;
              while (($data = fgetcsv($handle, ",")) !== FALSE)
              {
                    if($data[2]==null) {
                        $failure_count++;
                    }
                    else {
                        $success_count++;
                        $que = 'INSERT INTO TA_Records (`First Name`, `Last Name`, `Email`, `course`, `registration status`) values ("'.$data[0].'","'.$data[1].'","'.$data[2].'","'.$data[3].'","incomplete")';
                        $result = mysqli_query($conn,$que);
                    }
              }

                    $msg = $_FILES["picpath"]["name"].' successfully uploaded and '.$success_count.' TAs added to course ';
                    if($failure_count > 0){
                        $msg =   $msg .' and '. $failure_count.' failed to add because of insufficient data';
                    }
                    $_SESSION['message'] =  $msg;

              fclose($handle);
              header("Location:./faculty_dashboard.php");
        }
} else {
     echo '<script type="text/javascript">alert("No File selected")</script>';
}
$conn = null;
?>