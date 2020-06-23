<?php
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$url_components = parse_url($url);
$params = "";
if(count($url_components)>3){
    parse_str($url_components['query'], $params);
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body margin="0">
<table class="table">

   <thead>
      <tr>
         <th class="thick">TA</th>
         <th class="thick">Meeting link</th>
      </tr>
   </thead>
   <tbody>
   <?php
    $servername = "tethys.cse.buffalo.edu:3306";
    $username = "ashishav";
    $password = "50337024";
    $dbname = "cse442_542_2020_summer_teamh_db";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $que = "SELECT * FROM TA_records WHERE `Is available` = 'true' AND `Email` IN (SELECT instructor_email FROM faculty_course_mapping_table WHERE course_id = '".$params['course_id']."' ) ";
    $result = mysqli_query($conn,$que);

    $num = mysqli_num_rows($result);
    if($num>0) {
        while($row = mysqli_fetch_assoc($result))
    {
        $office_location = $row['Office Location'];
        ?>
      <tr>
         <td class="thick"><?php echo $row['First_Name']." ".$row['Last_Name'];?></td>
         <td class="thick"><?php echo "<a href='$office_location' target='_blank'>$office_location</a>";?></td>
      </tr>
      <?php
        }
        } else {
        echo "<tr><td class='thick' colspan='2'>No TAs available for this course</td></tr>";
        }
        $conn = null;
        ?>
   </tbody>
</table>
</body>
</html>