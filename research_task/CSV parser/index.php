<?php
	if ( isset($_POST["Submit"]) ) {
  		 if ( isset($_FILES["csv_file"])) {
			echo "file is set";
            //if there was an error uploading the file
       			 if ($_FILES["csv_file"]["error"] > 0) {
 		           echo "Return Code: " . $_FILES["csv_file"]["error"] . "<br />";

 		       }
       		 else {
                 //Print file details
			
       		      echo "Upload: " . $_FILES["csv_file"]["name"] . "<br />";
       		      echo "Type: " . $_FILES["csv_file"]["type"] . "<br />";
     		      echo "Size: " . ($_FILES["csv_file"]["size"] / 1024) . " Kb<br />";
     		      echo "Temp file: " . $_FILES["csv_file"]["tmp_name"] . "<br />";
			
			echo "<table border='1' ><tr><th>First Name</th><th>Last Name</th><th>Email address</th><th>Office location</th><th>Scheduled office hours</th><th>Is available</th></tr>";

			$handle = fopen($_FILES['csv_file']['tmp_name'], "r");
			$headers = fgetcsv($handle, ",");
			$row_count = 0;
			while (($data = fgetcsv($handle, ",")) !== FALSE) 
			{ 
				$row_count++;
				echo "<tr>";
				echo "<td>".$data[0]."</td>";
				echo "<td>".$data[1]."</td>";
				echo "<td>".$data[2]."</td>";
				echo "<td>".$data[3]."</td>";
				echo "<td>".$data[4]."</td>";
				echo "<td>".$data[5]."</td>";
				echo "</tr>";
			}
			echo "</table><br/><br/>";
			if($row_count == 0) {
				echo '<script type="text/javascript">alert("No entries in CSV")</script>';
			}
			
		fclose($handle);

      		  }
    	 } else {
             echo "No file selected <br />";
   	  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Sign in</title>
</head>
<body>
<h1 align="center">TA AVAILABILITY SYSTEM</h1>
<div id='border' class="container">
  <form method="post" enctype="multipart/form-data">
	<input type="hidden" id="hide" name="hide">
      <label for="csv_file"   class="thick">Upload CSV :</label>
      <input type="file" id="csv_file" name="csv_file"/>
      <button type="submit" name="Submit">Load</button>
  </form>
<div id="table" style="display:none;">
<table id="csv_table" >
  <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email address</th>
    <th>Office location</th>
    <th>Scheduled office hours</th>
    <th>Is available</th>
  </tr>
</table>
</div>
  <br>
</div>

</body>
</html>


