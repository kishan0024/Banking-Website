<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SignUp</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="logincss.css">
    
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
<?php
include 'logindata.php';

?>
<script>
function validateForm() {
  var x = document.forms["myform"]["name"].value;
  var pass= document.forms["myform"]["password"].value;
  if (x == "") {
    alert("Name must be filled out");
    document.forms["myform"]["name"].focus();
    return false;
  }
  if(pass=="")
  {
    alert("password must be filled out");
    document.forms["myform"]["password"].focus();
    return false;
  }
  if(!isNaN(x))
  {
    alert("We do not accept only numbers as username");
    document.forms["myform"]["name"].focus();
    return false;
  }

}
</script>
</head>
<body>
    
<div class="wrapper">
<div id="inner1">
    <div>
    <a href="login.php" id="selected">Log in</a>
    </div>
    <div>
    <a href="signup.php">Sign Up</a>
    </div>
</div>
<form action="logindata.php" onsubmit="return validateForm()" method="post" name="myform">
<?php 
         if(isset($_GET["status"]))
         {
         
            echo '<div style="color:white; background-color:rgb(203, 77, 77);border: 1px solid rgb(255, 255, 255); margin:1rem">
        
            <strong>Error!</strong>'.htmlspecialchars($_GET["status"]).'
           </div> '; 
         }
 ?>
<div id="nameform" >
    <label for="name">Name:</label>
    <input type="text" id="name" placeholder="name" name="uname"> 
 
</div>
<div id="passwordform">
    <label for="password">Password</label>
    <input type="password" id="password" placeholder="password" name="pass">
   
</div>
    <div class="submitdata">
    <input type="submit" value="Log In" id="login" name="login">
   
    </div>
    <div id="newuser">
        Not a user? Be a Part of family <a href="signup.php">Click Here</a>
    </div>
</form>

</div>


</body>
</html>