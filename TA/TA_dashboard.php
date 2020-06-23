<?php
session_start();
if (isset($_SESSION['message'])) {
    echo '<script type="text/javascript">alert("' . $_SESSION['message'] . '");</script>';

    
}

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="tab.css">
  <script type="text/javascript">
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}


</script>
<style>
body {font-family: Arial;}
<style>
* {
  box-sizing: border-box;
}

body {
  
  background-image:url('campus.jpg');
    background-repeat:repeat-x;
    background-size: cover;

}


.header {
  background-color: #f1f1f1;
  padding: 5px;
  
}
.topnav {

  overflow: visible;
    background-color: #f1f1f1;
  border: 0px solid #ccc;
    padding: 0px;
    
}

.column {
  float: left;
  padding: 10px;
}


.column.middle {
  width: 50%;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}


@media screen and (max-width: 600px) {
  .column.side, .column.middle {
    width: 100%;
  }
}


.footer {
  background-color: #f1f1f1;
  padding: 10px;
  text-align: center;
  width: 100%;

  position:absolute;
  

}

#center {
    margin: auto;
  width: 60%;
    border: 0px solid #73AD21;
    padding: 20px
}
.alignleft { 
    display: inline; 
    float: left; 
    } 
.alignright { 
    display: inline; 
    float: right; 
    } 
 #floatleft{
  float: left;
 }
 #floatright{
  float: right;
 }
#border {border-style:groove; width: 300px;;
        Background-color: rgba(0,0,0,0.7);
      border-style: solid;
      border-radius: 15px;}
.thick {font-weight:bold;
		color:#0000ff;
		}




/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border-top: none;
}
</style>
</head>
<body>
  <div align="center" class="header">

  <img src="icon.png"  style="vertical-align:middle" width="180" height="120">
    <h1>TA Dashboard</h1>
</div>
<div class="topnav">
<div class="tabbed">
      <ul>
        <li onclick="openCity(event,'edit')" class="tablinks">Edit Profile</li>
        <li onclick="openCity(event,'profile')" class="tablinks">My Profile</li>
        <li onclick="openCity(event,'officehour')" class="tablinks active">Office Hour</li>
      </ul>
</div>
</div>

<div id="center" class="row">
<div class="column middle" id="center">

  <!-- office hour page -->
          <div id="officehour" class="tabcontent" style= "display:block";>
            <div id='border' class="container">
            <br>

          <label class="thick">Office Hours :</label>
          <label class="thick">7:00-9:00</label>
          <br>
          <br>
        <input type="submit" class="btn btn-primary btn-sm" name="submit" value="Start Office Hours">
        <br>
        <br>  
        <input type="submit" class="btn btn-primary btn-sm" name="submit" value="End Office Hours">
			  <br>
			  <br>
			  <input type="submit" class="btn btn-danger btn-sm" name="submit" value="Log Out">
			 <br>
       <br>

          </div>
          
          </div>

<!--TA Profile-->


<div id="profile" class="tabcontent">
  	<div id='border' class="container">
  <?php
  $em = $_SESSION['email'];
  $con=mysqli_connect("localhost","root","","ta_system");
$result = mysqli_query($con,"SELECT * FROM ta_records WHERE Email='$em'");
$result2 = mysqli_query($con,"SELECT * FROM faculty_course_mapping_table WHERE instructor_email='$em'");
while($row = mysqli_fetch_array($result))
{
    $fn = $row['First_Name'];
    $ln = $row['Last_Name'];
}
while($row = mysqli_fetch_array($result2))
{
  $course = $row['course_name'];
}
  ?>
    <br>
            <form name="form3" action="addTA_file.php" method="post" enctype="multipart/form-data">
  			  <label class="thick">Firstname :</label><img src="display_photo.php" width="90px", height="120px", id="floatright" />
  			  <br>
  			  <label class="thick"><?php echo $fn ?></label>
  			  <br>
  			  <br>
  			  <label class="thick">Lastname :</label>
  			  <br>
  			  <label class="thick"><?php echo $ln ?></label>
          <br>
          
      
  			  <br>
  			  
			  <lable class="thick"> Email :</lable>
			  
			　<p class="thick"><?php echo $em ?></p>
			  
			  
			  <lable class="thick">course name :</lable>
			  <br>
			  <label class="thick"><?php echo $course ?></label>
			  <br>

			 
			</form>
			<br>

	</div>
	<br>
</div>

<!--Edit TA Profile-->

<div id="edit" class="tabcontent">
	<div id='border' class="container">
          <br>
          <label class="thick">Email: <?php echo $_SESSION['email']; ?></label>
            <form name="form1" action="editTA.php" method="post" enctype="multipart/form-data">
          <label class="thick">Firstname :</label>
          
          <input id="floatleft" type="text" name="firstname" placeholder="Enter Your firstname" required>
          <br>
          <br>
          <label class="thick">Lastname :</label>
          <br>
          <input id="floatleft" type="text" name="lastname" placeholder="Enter Your lastname" required>
          <br>
          <br>

      <lable class="thick">Upload TAs Photo:</lable>
      <img src="display_photo.php" width="90px", height="120px" />
      
      <br>
    　<input type="file" name="picpath" id="picpath" style="display:none;" onChange="document.form1.path.value=this.value.replace('C:\\fakepath\\', '')" required>
    　<input id="floatleft" type="button" class="btn btn-success" value="Upload photo" onclick="document.form1.picpath.click()"> 

      <br>
      <br>
      <input name="path" readonly>
      <br>
      <br>

      <!--<input type="submit" class="btn-success btn-sm" name="submit" value="Submit photo">-->

        

        <lable class="thick">Enter course name :</lable>
        <br>
        <input id="floatleft" type="text" name="course" placeholder="Enter Your course" required>
        <br>
        <br>
        <input type="submit" class="btn btn-primary" name="submit" value="Save">
       
      </form>
      <br>

    </div>
    <br>
    <br>
</div>



</div>

</div>

<div class="footer" >
  <p class="thick">Office phone number: 7165800633 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Office email: shiyulu@buffalo.edu</p>

</div>
</body>
</html> 
<?php
if(isset($_SESSION['listTAs'])) {
    echo '<script type="text/javascript">openCity(event,"TAlist");</script>';
    unset($_SESSION['listTAs']);
}
if(isset($_SESSION['removeTA'])) {
    echo '<script type="text/javascript">openCity(event,"remove");</script>';
    unset($_SESSION['removeTA']);
}
?>