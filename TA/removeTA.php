<?php
session_start();
$servername = "tethys.cse.buffalo.edu:3306";
$username = "ashishav";
$password = "50337024";
$dbname = "cse442_542_2020_summer_teamh_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$em = $_POST['rmTA'];
$course = $_POST['removeTA_course_name'];
$loggedin_user = $_SESSION["email"];
$selectTA = "SELECT Email FROM TA_records WHERE Email='$em'";
$result = $conn->query($selectTA);

if($result->num_rows > 0){
    $que = "SELECT * FROM faculty_course_mapping_table WHERE `instructor_email` = '$em' AND `course_name` IN (select course_name from faculty_course_mapping_table where `instructor_email` = '$loggedin_user')";
    $result = mysqli_query($conn,$que);

    $num = mysqli_num_rows($result);
    if($num > 0)
    {
        $que = "SELECT * FROM faculty_course_mapping_table WHERE `instructor_email` = '$em' AND `course_name` = '$course'";
        $result = mysqli_query($conn,$que);
        $num = mysqli_num_rows($result);
        if($num > 0)
        {
            mysqli_query($conn,"DELETE FROM TA_records WHERE Email='$em'");
            mysqli_query($conn,"DELETE FROM faculty_course_mapping_table WHERE instructor_email='$em' AND course_name = '$course'");
            mysqli_close();
            $_SESSION['message'] = "TA removed successfully!";
            $_SESSION['listTAs'] =  "success";
        } else {
            $_SESSION['message'] = "Failed! TA is not registered under this course please check course name you entered.";
            $_SESSION['removeTA'] =  $em;
            $_SESSION['removeTA_course'] =  $course;
        }
    } else {
        $_SESSION['message'] = "Failed! TA not registered under any of your courses. Please check the email you entered.";
        $_SESSION['removeTA'] =  $em;
        $_SESSION['removeTA_course'] =  $course;
    }
} else{
    $_SESSION['message'] = "Failed! This user is not in TA list. Please check the email you entered.";
    $_SESSION['removeTA'] =  $em;
    $_SESSION['removeTA_course'] =  $course;
}
header("Location:./faculty_dashboard.php");
$conn = null;
?>