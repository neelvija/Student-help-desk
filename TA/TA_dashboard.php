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
        Background-color: rgba(0,0,0,0.2);
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
        <li onclick="openCity(event,'end')" class="tablinks">End Office Hours</li>
        <li onclick="openCity(event,'start')" class="tablinks active">Start Office Hours</li>
      </ul>
</div>
</div>

<div id="center" class="row">
<div class="column middle" id="center">

 <!-- start office hour page -->
<?php
  $em = $_SESSION['email'];
 $servername = "tethys.cse.buffalo.edu:3306";
    $username = "ashishav";
    $password = "50337024";
    $dbname = "cse442_542_2020_summer_teamh_db";

    $con = mysqli_connect($servername, $username, $password, $dbname);

$result = mysqli_query($con,"SELECT * FROM TA_records WHERE Email='$em'");
$result2 = mysqli_query($con,"SELECT * FROM faculty_course_mapping_table WHERE instructor_email='$em'");
while($row = mysqli_fetch_array($result))
{
    $fn = $row['First_Name'];
    $ln = $row['Last_Name'];
}
$course = array();
$courseid = array();
$i = 0;

while($row = mysqli_fetch_array($result2))
{ 
  $course[$i] = $row['course_name'];
  $courseid[$i] = $row['course_id'];
  $i = $i + 1;
}

  ?>
          <div id="start" class="tabcontent" style= "display:block";>
            <div id='border' class="container">
            <br>
              <?php
          $em = $_SESSION['email'];
          ?>
    
          <form name="form3" action="start_office.php" method="post">
    <label class="thick">Meeting Link :</label>
    <br>
    <input id="floatleft" type="text" name="meetinglink" placeholder="Enter Your Meeting Link" required>
    <br>
    <br>

              <div class="btn-group">
            <label class="thick">select course:</label>
        <br>
        <p></p>
        <select  name='courselist' required>
          <option value=''>Select Course</option>;
        <?php 
        $i = 0;
        $n = count($course);
        while ($i < $n)
        {
          //echo $course[$i];
          echo "<option value='$courseid[$i]'>".$course[$i]."</option>";
          $i = $i + 1;

        }
         ?>
         </select>
         </div>
        <br>
        <br>
          <input type="submit" class="btn btn-success btn-sm" name="start" value="Start" />
      </form>
      <br>
      <br>
           </div>
          
          </div>

  





</div>

</div>

<div class="footer" >
  <p class="thick">Office phone number: 7165800633 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Office email: shiyulu@buffalo.edu</p>

</div>
</body>
</html>