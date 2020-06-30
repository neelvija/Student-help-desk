<?php
session_start();
if(isset($_POST['Submit'])) 
{
    $_SESSION['email_to_send'] = $_POST['email'];
    header("Location:./send_mail.php");
}
?>
<html>
<form method="post">
	<input type = "email" name = "email" id = "email"></input><br>
	<input type = "submit" name = "Submit" id= "Submit"/>
</form>
</html>