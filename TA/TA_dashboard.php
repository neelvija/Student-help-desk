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

  <!-- end office hour page -->
          <div id="end" class="tabcontent">
            <div id='border' class="container">
  <?php
  $em = $_SESSION['email'];
  $servername = "tethys.cse.buffalo.edu:3306";
    $username = "ashishav";
    $password = "50337024";
    $dbname = "cse442_542_2020_summer_teamh_db";

    $con = mysqli_connect($servername, $username, $password, $dbname);

$result = mysqli_query($con,"SELECT * FROM TA_records WHERE Email='$em'");
while($row = mysqli_fetch_array($result))
{
    $ml = $row['Office_Location'];
    $ci = $row['course_id'];
}

  ?>
      <br>

        <form name="form2" action="end_office.php" method="post">
        <label class="thick">Meeting Link :</label>
    <br>
    <label class="thick"><?php echo $ml ?></label>
    <br>
    <label class="thick">Course id :</label>
    <br>
    <label class="thick"><?php echo $ci ?></label>
    <br>
        <input type="submit" class="btn btn-danger btn-sm" name="End" value="End"/>
        <br>
    </form>
    <br>
          </div>
          
          </div>

<!--TA Profile-->


<div id="profile" class="tabcontent">
    <div id='border' class="container">
  <?php
  $em = $_SESSION['email'];

  $servername = "tethys.cse.buffalo.edu:3306";
    $username = "ashishav";
    $password = "50337024";
    $dbname = "cse442_542_2020_summer_teamh_db";

    $con = mysqli_connect($servername, $username, $password, $dbname);


//$result = mysqli_query($con,"SELECT * FROM TA_records WHERE Email='$em'");
//$result2 = mysqli_query($con,"SELECT * FROM faculty_course_mapping_table WHERE instructor_email='$em'");

$stmt = $conn->prepare("SELECT * FROM TA_records WHERE Email= ?");
$stmt->bind_param("s", $email);
$email = $em;
$stmt->execute();
$result = $stmt->get_result();

while($row = $result->fetch_assoc())
{
    $fn = $row['First_Name'];
    $ln = $row['Last_Name'];
}

$stmt = $conn->prepare("SELECT * FROM faculty_course_mapping_table WHERE instructor_email= ?");
$stmt->bind_param("s", $email);
$email = $em;
$stmt->execute();
$result2 = $stmt->get_result();

$course = array();
$i = 0;
while($row = $result2->fetch_assoc())
{ 
  $course[$i] = $row['course_name'];
  $i = $i + 1;
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
        <label class="thick"><?php 
        $i = 0;
        $n = count($course);
        while ($i < $n)
        {
          echo $course[$i];
          echo "<br>";
          $i = $i + 1;

        }
         ?></label>
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
          
          <input id="floatleft" type="text" name="firstname" value=<?php echo $fn ?> required>
          <br>
          <br>
          <label class="thick">Lastname :</label>
          <br>
          <input id="floatleft" type="text" name="lastname" value=<?php echo $ln ?> required>
          <br>
          <br>

      <lable class="thick">Upload TAs Photo:</lable>
      <img src="display_photo.php" width="90px", height="120px" />
      
      <br>
    　<input type="file" name="picpath" id="picpath" style="display:none;" onChange="document.form1.path.value=this.value.replace('C:\\fakepath\\', '')">
    　<input id="floatleft" type="button" class="btn btn-success" value="Upload photo" onclick="document.form1.picpath.click()"> 

      <br>
      <br>
      <input name="path" readonly>
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
  <p class="thick">Office phone number: 9999999999 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Office email: university@buffalo.edu</p>

</div>
</body>
</html>