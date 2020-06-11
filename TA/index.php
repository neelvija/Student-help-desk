<?php
 session_start();

	$servername = "tethys.cse.buffalo.edu:3306";
	$username = "ashishav";
	$password = "50337024";
	$dbname = "cse442_542_2020_summer_teamh_db";

		$conn = mysqli_connect($servername, $username, $password, $dbname);

		if(isset($_POST['Submit'])){

			$que = "SELECT * FROM user_data WHERE email = '".$_POST['email']."' AND password='".$_POST['pwd']."'";
			$result = mysqli_query($conn,$que);

			$row = mysqli_fetch_array($result);


			$num = mysqli_num_rows($result);

			if($num > 0)
			{
				session_start();
				$_SESSION["fname"] = $row['first_name'];
				$_SESSION["lname"] = $row['last_name'];
				$_SESSION["email"] = $row['email'];

                if($row['user_type']==='faculty') {
                    header("Location:./faculty_dashboard.php");
                } else {
				    echo '<script type="text/javascript">alert("' . $row['user_type'] . '")</script>';
                }
			}
			else{

				echo '<script type="text/javascript">alert("Invalid credentials")</script>';
			}
		}

$conn = null;
?>
<!DOCTYPE html>
<html>
<head>
  <title>Sign in</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
    body
  {
    background-image:url('background1.png');
    background-repeat:repeat-x;
    background-size: cover;
  }

    .alignleft {
    display: inline;
    float: left;
    }
    label.normal {font-weight:normal;}
    label.light {font-weight:lighter;}
    label.thick {font-weight:bold;}
    label.thicker {font-weight:900;}
    #border {border-style:groove; width: 300px;;
    		Background-color: rgba(0,0,0,0.2);
			border-style: solid;
			border-radius: 15px;}
      </style>
</head>
<body>
<!--<img class="alignleft" src="icon.png" alt="Smiley face" width="480" height="320">-->
<h1 align="center">TA AVAILABILITY SYSTEM</h1>
<div id='border' class="container">

  <br>
  <form method = "post">
    <div class="form-group">
      <label for="email"  class="thick">Email:</label>
      <input type="email" id="email" name="email" placeholder="Enter email" size="30" required/>
    </div>
    <div class="form-group">
      <label for="pwd"   class="thick">Password:</label>
      <input type="password" id="pwd" name="pwd" placeholder="Enter password" size="30" minlength = "8" required/>
    </div>
      <label class="form-check-label">
        <a href="#">Forget password</a>
      </label>
    <br><br>

    <button type="submit" name="Submit" class="btn btn-primary">log in</button>
      <label class="form-check-label">
        <a href="#">Sign up</a>
      </label>

  </form>
  <br>
</div>

</body>
</html>