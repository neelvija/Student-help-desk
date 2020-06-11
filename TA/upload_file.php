<!DOCTYPE html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ta_system";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ( isset($_FILES["picpath"])) {
       //if there was an error uploading the file
        if ($_FILES["picpath"]["error"] > 0) {
              echo '<script type="text/javascript">alert("Return Code: " '. $_FILES["picpath"]["error"].')</script>';
        } else {
              $em = $_POST['email'];
              $pic = $_FILES['picpath'];
              $name=$pic['name'];
              $selectTA = "SELECT * FROM ta_records WHERE Email='$em'";
              
              $result = $conn->query($selectTA);
              /*if ($result->num_rows > 0) {
    // 输出数据
    		  while($row = $result->fetch_assoc()) {
        		echo "id: " . $row["Email"]. "<br>";
    				}
				} else {
    				echo "0 结果";
				}*/

              if($result->num_rows>0){
                  echo $name;
                  $tmpfile=$pic['tmp_name']; 
                  if(!file_exists("upload/".$name))
                  { 
                   move_uploaded_file($tmpfile,"upload/".$name);
                  }
                  mysqli_query($conn,"UPDATE ta_records SET Photo='upload/$name' WHERE Email='$em' ");
                  mysqli_close();
                  echo 'Succeed！';
              } else{
                  echo 'Sorry! You have not nominated this user as a TA. Please check if there is a typo else consider updating TA database!';
              }  	
              }
} else {
     echo '<script type="text/javascript">alert("No File selected")</script>';
}
$conn = null;
?>