
<!DOCTYPE html>
<html>
<head>
  <script>
  function validateForm(){
    var x=document.forms["myForm"]["email"].value;
    var atpos=x.indexOf("@");
    var dotpos=x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length){
      alert("This is not a correct email");
        return false;
    }
  }
  </script>
</head>
<head>
  <img class="alignright" src="icon.png" alt="Smiley face" width="240" height="160"><h1 align="center">TA AVAILABILITY SYSTEM</h1>
  <h4><title>Sign up</title></h4>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
 

  .alignright { 
    display: inline; 
    float: right; 
    } 
  </style>
</head>

<body>


<div class="container">
  
  <!--<form>-->
    <br>
    <br>
    <h2>Already have the code?</h2>
    <form action="verify.php" method="post">
    <div class="form-group">
    	<label for="email">Email:</label>
      
        <input type="Email" name="email" size="50" placeholder="We need your email to identify you">
    	<label for="vericode">Verification code:</label>
		<input type="text" name="verication">
		<br>
		<input type="submit" class="btn btn-primary btn-sm" value="Verify">
    </div>
    </form>
    <h2>Sign up</h2>
    <form>
    <div class="form-group">
      <label for="email">First name:</label>
      <input type="text" name="firstname" class="form-control" placeholder="Enter first name">
    </div>

    <div class="form-group">
      <label for="email">Last name:</label>
      <input type="text" name="lastname" class="form-control" placeholder="Enter last name">
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      
      <input type="Email" name="email" size="50" placeholder="Enter email">
      
    </div>
    
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password">

    </div>
    
    <input type="submit" class="btn btn-primary btn-sm" value="Submit">
  	</form>
</div>

</body>
</html>