<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ta_system";

$conn = mysqli_connect($servername, $username, $password, $dbname);

//$que = "SELECT * FROM TA_records WHERE Email = '".$_POST['login_email']."' AND password='".$_POST['login_pwd']."'";
//$result = mysqli_query($conn,$que);
//prepared statement
$stmt = $conn->prepare("SELECT * FROM TA_records WHERE Email = ? and password = ?");
$stmt->bind_param("ss", $email, $pw);
$email = $_POST['login_email'];
$pw = $_POST['login_pwd'];
$stmt->execute();
$result = $stmt->get_result();


if($row = $result->fetch_assoc())
{
    if($row['registration status'] === "verified") {
        $_SESSION["fname"] = $row['First_Name'];
        $_SESSION["lname"] = $row['Last_Name'];
        $_SESSION["email"] = $row['Email'];
        //echo '<script type="text/javascript">alert("' . $_SESSION['email'] . '");</script>';
        if($row['instructor type']==='faculty') {
            header("Location:./faculty_dashboard.php");
        } 
        elseif ($row['instructor type']==='TA') {
        	header("Location:./TA_dashboard.php");
        }
        else {
            $_SESSION["message"] =  "instructor type : ".$row['instructor type'];
            header("Location:./index.php");
        }
    } else {
        $_SESSION['message'] = "Oops! You do not have verified account. Check your mail for verification code";
        $_SESSION['verifyemail'] = $email;
        header("Location:./index.php");
    }

}
else{
    $_SESSION["message"] = "Invalid credentials!!";
    header("Location:./index.php");
}
$conn = null;
?>