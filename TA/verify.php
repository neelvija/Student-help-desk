<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ta_system";

$conn = mysqli_connect($servername, $username, $password, $dbname);

 
$veri = $_POST["verication"];
$em = $_POST["email"];
//$firstname = $_POST["firstname"];
//$lastname = $_POST["lastname"];
//$passwaord = $_POST["password"];


$result = mysqli_query($conn,"SELECT * FROM ta_records WHERE Email='$em'");
while($row = mysqli_fetch_array($result))
{
	if ($row['confirmation code'] == $veri)
	{
		echo "<script>alert('Congratulations! Your account has been created');
		window.location.href='{$_SERVER['HTTP_REFERER']}'</script>";

	}
    else
    {
    	echo "<script>alert('Sorry,your account has not been created');
    	window.location.href='{$_SERVER['HTTP_REFERER']}'</script>";

    }
}

              



$conn->close();
?>