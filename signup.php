<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SignUp</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="signupcss.css">
    
    <?php 
          include 'connection.php';
          include 'signupdata.php';
    ?>
    
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
<script>
    function validateForm() {
        var uname=document.forms["myform"]["uname"].value;
        var pass= document.forms["myform"]["password"].value;
        var confpass= document.forms["myform"]["confpass"].value;
        var email=document.forms["myform"]["email"].value;
        var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/

        if (uname == "") {
    alert("Name must be filled out");
    document.forms["myform"]["name"].focus();
    return false;
            }
if(email=="")
  {
    alert("please enter email");
    document.forms["myform"]["password"].focus();
    return false;
  }
  if(pass=="")
  {
    alert("password must be filled out");
    document.forms["myform"]["password"].focus();
    return false;
  }
  if(!pass.match(passw))
  {
      alert("7 to 16 characters which contain only characters, numeric digits, underscore and first character must be a letter, with Capital one letter");
    return false;
  }
  
  if(pass!=confpass)
  {
    alert("password doesn't match");
    document.forms["myform"]["password"].focus();
    return false;
  }
  
    }
</script>
</head>
<body>
    
<div class="wrapper">
<div id="inner1">
    <div>
    <a href="login.php" >Log in</a>
    </div>
    <div>
    <a href="signup.php" id="selected">Sign Up</a>
    </div>
</div>
<form action="signupdata.php" onsubmit="return validateForm()" method="post" name="myform">
<div id="nameform" >
    <label for="name">Name:</label>
    <input type="text" id="name" placeholder="Name here..." name="uname">
    <?php
    if(isset($_GET["status"])) 
    {
      if($_GET["status"]==true) {
        echo ' <div style="color:white; background-color:rgb(203, 77, 77);border: 1px solid rgb(255, 255, 255);">
    
        <strong>Error!</strong>User Already exists! 
       </div> '; 
      }
    }
       
     
    ?>    
</div>
<div id="mail">
    <label for="email">Email</label>
    <input type="email" id="email" name="email" placeholder="Enter email here...">
    <?php
    if(isset($_GET["mailstatus"])) 
    {
      if($_GET["mailstatus"]==true) {
        echo ' <div style="color:white; background-color:rgb(203, 77, 77);border: 1px solid rgb(255, 255, 255);">
    
        <strong>Error!</strong>Email Already exists! 
       </div> '; 
      }
    }
       
     
    ?>    
</div>
<div id="passwordform">
    <label for="password">Password</label>
    <input type="password" id="password"  name="pass" placeholder="password here...">
    <div class="errormsg"></div>
</div>

<div id="confpass1">
    <label for="confpass">Confirm Password</label>
    <input type="password" id="confpass" name="confpass"> 
</div>
    <div class="submitdata">
    <input type="submit" value="Sign Up" id="signup" name="signup">
    </div>
    <div id="newuser">
        Not a user? Be a Part of family <a href="signup.php">Click Here</a>
    </div>
</form>

</div>
</body>
<script src="app1.js"></script>

</html>