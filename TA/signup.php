<?php
session_start();
$servername = "tethys.cse.buffalo.edu:3306";
$username = "ashishav";
$password = "50337024";
$dbname = "cse442_542_2020_summer_teamh_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(isset($_POST['Submit'])) {
    $que = 'INSERT INTO TA_records (`First Name`, `Last Name`, `Email`, `course`, `registration status`) values ("'.$_POST['first_name'].'","'.$_POST['last_name'].'","'.$_POST['email'].'","'.$_POST['pwd'].'","incomplete")';
    $result = mysqli_query($conn,$que);
    $_SESSION['message'] = "Congratulations! Check your email for further instructions.";
    header("Location:./index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Sign up</title>
</head>
<head>
  <img class="alignright" src="icon.png" alt="Smiley face" width="240" height="160"><h1 align="center">TA AVAILABILITY SYSTEM</h1>
  <h4><title>Sign up</title></h4>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
  .alignright { 
    display: inline; 
    float: right; 
    } 
  </style>
</head>

<body>


<div class="container">
    <br>
    <br>
    <h2>Sign up</h2>
    <form name="myForm" method="post">
        <div class="form-group">
          <label for="first_name">First name:</label>
          <input type="text" class="form-control" id="first_name" name = "first_name" placeholder="Enter first name" required>
        </div>

        <div class="form-group">
          <label for="last_name">Last name:</label>
          <input type="text" class="form-control" id="last_name" name = "last_name" placeholder="Enter last name" required>
        </div>

        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" name="email" size="50" placeholder="Enter email" required>
        </div>

        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" minlength="8" id="pwd" placeholder="Enter password" required>
        </div>

        <button type="submit" class="btn btn-primary" name = "Submit" id="Submit">Submit</button>
    </form>
</div>

</body>
</html>