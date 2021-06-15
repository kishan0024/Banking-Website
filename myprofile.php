<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Sparks Foundation Bank</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="styles.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet"> 
<?php 
 if(!isset($_SESSION)) 
 { 
     session_start(); 
 } 
      if(!isset($_SESSION["username"]))
      {
          header("location:login.php");
      }
     
?>
</head>
<body>
<div id="wrap">

    <div id="title1">
    The Sparks Co-op Bank Lt.
    </div>
    <div class="logo1">
    <img src="undraw_Credit_card_re_blml.svg" alt="logo" id="logo_res">
    </div>
</div>
<div class="navbar">
        <a href="myprofile.php" class="he">My Profile</a>
        <a href="main.php" class="he">Home</a>
        <a href="main.php#banking" class="he">Banking</a>
        <a href="transactions.php" class="he">Transactions</a>
        <a href="aboutus.php" class="he">About us</a>
        <a href="logout.php" class="he">Log Out</a>
</div>

<div id="perinfo">
    <div id="pro">
    <img src="man.svg" alt="profile" id="res1">
    </div>
    <div id="ac_info">
      Name: <?php echo $_SESSION["username"]?> <br>
      Ac No: <?php echo $_SESSION["acno"]?> <br>
      Balance: <?php
             include_once 'connection.php';
             $user=$_SESSION["username"];
             $query="SELECT * FROM `accountdetails` WHERE username='$user'";
             $result=mysqli_query($my_sql,$query);
             if(mysqli_num_rows($result) == 1)
             {   
                 while ($row = mysqli_fetch_assoc($result)) {
                   echo $row["balance"];
                   }
                
             }
             ?><br>
      Email id: <?php echo $_SESSION["mail"]?> <br>
      Branch: Ahemedabad <br>
      IFSC code: BARB0AHM <br>

       </div>


</div>
<hr style="width:90%; margin:1rem; color:yellow">
<footer>
    <div style="text-align:center;">Copyright © 2021.Kishan Maheta. All Rights Reserved.</div>
    <div id="socialmedia">
    <div class="foot">
    <a href="https://www.linkedin.com/in/kishan-maheta-1ba5481a6" target="_blank"><img src="linkedin.png" alt="linkedin"></a>
    </div>
    <div class="foot">
    <a href="https://www.instagram.com/_i.am.kishan_/" target="_blank"><img src="instagram.png" alt="instagram"></a>
    </div>
    <div class="foot">
    <a href="https://www.facebook.com/maheta.kishan/" target="_blank"><img src="facebook.png" alt="facebook"></a>
    </div>
    </div>
</footer>