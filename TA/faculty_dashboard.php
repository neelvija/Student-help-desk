<?php
session_start();
if ($_SESSION['message']) {
    echo '<script type="text/javascript">alert("' . $_SESSION['message'] . '");</script>';
    unset($_SESSION['message']);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Faculty Dashboard</title>
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
  #border{
    margin: auto;
    border-style:groove; width: 400px;;
        Background-color: rgba(0,0,0,0.2);
      border-style: solid;
      border-radius: 15px;
  }

  #center {
    margin: auto;
    width: 30%;

          }
  #strong{
    font-weight:bold;
    font-size:20px;
  }
  </style>
</head>
<body>
<h1 align="center">Faculty Dashboard</h1>
<br>
<br>

<div id="border">
<form name="form1" action="upload_file.php" method="post" enctype="multipart/form-data">
  <br>  
  <div class="form-group">
   <label for="email"  class="thick">Email:</label>
   <input type="email" id="email" placeholder="Enter email" size="30">
  </div>

  <p id="strong">Upload TA's Photo:</p>
  <div>
　<input type="file" name="picpath" id="picpath" style="display:none;" onChange="document.form1.path.value=this.value" required>
　<input type="button" class="btn btn-primary" value="Upload photo" onclick="document.form1.picpath.click()"> 
  <input name="path" readonly>
  <br>
  <br>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="submit" class="btn btn-primary btn-sm" name="submit" value="Submit photo">
  </div>
</form>
<br>
<br>


<form name="form2" action="upload_TA_list.php" method="post" enctype="multipart/form-data">
  <p id="strong">Upload TA list:</p>
  
　<input type="file" name="picpath" id="picpath" style="display:none;" onChange="document.form2.path.value=this.value" required>　
　<input type="button" class="btn btn-primary" value="Upload CSV" onclick="document.form2.picpath.click()"> 
  <input name="path" readonly>
  <br>
  <br>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="center" type="submit" class="btn btn-primary btn-sm" name="submit" value="Submit file">
  </div>
</form>
</div>
</body>
</html>