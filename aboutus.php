<?php 


 if(!isset($_SESSION)) 
 { 
     session_start(); 
 } 
      if(!isset($_SESSION["username"]))
      {
          header("location:login.php");
      }
     

header("Refresh:35; url=main.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta http-equiv="refresh" content="10" >  -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Sparks Foundation Bank</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="styles.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet"> 


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
<hr style="width:90%; margin:1rem; color:yellow">
<div id="allinfo">
    <div id="info1">
    <div style="text-align:left; font-size:1.4rem">
&#60;Who&#62;
</div>
<!-- content for who -->
<div style="width:100%; text-align:justify; font-size:1.1rem; margin-top:1rem; padding:1rem">
&#127183;We are The Sparks Bank, a group of bank with Branches all Over the Country, And happy to be India's International Bank. <br>
&#127183; It has been a long and eventful journey of almost a century across 21 countries. <br>
&#127183; Starting in 1908 from a small building in Baroda to its new hi-rise and hi-tech Baroda Corporate Centre in Mumbai, <br>
&#127183;is a saga of vision, enterprise, financial prudence and corporate governance.
    </div>
    </div>
    <!-- content for Why -->
    <div id="info2">
    <div style="text-align:left; font-size:1.4rem">
    &#60;Why&#62;
    </div>
    <div style="width:100%; text-align:justify; font-size:1.1rem; margin-top:1rem; padding:1rem">
    &#127774;We Provide you Best Services <br>
    <ul stlye="margin left:5rem">
    <li>24*7 ATM</li>
    <li>Attractive Interest on Loans</li>
    <li>Mobile Banking</li>
    <li>Life insurance</li>
    </ul>
    </div>
    </div>
    </div>
<!-- devloper info  -->
<hr style="width:90%; margin:1rem; color:yellow">
<div style="font-size:1.7rem">&#60;Devloper Info&#62; </div>
    <div id="devinfo">
    <div id="profile">
        <img src="profilepic.jpeg" alt="author" id="prof">
    </div>
    <div id="desc">
        <div>Name:Kishan Maheta [I like to Code] </div>
        <div>&#127774;Computer Engineer</div>
        <div>  Age:19 </div>
        <div> College:BVM Engineering Collge (2019-2023)</div>
        <div>Skills: Full Stack Devloper (HTML,CSS,SQl,JS)</div>
        

    </div>
    </div>
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
