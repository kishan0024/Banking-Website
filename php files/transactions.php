<?php 
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
        <a href="#banking" class="he">Banking</a>
        <a href="transactions.php" class="he">Transactions</a>
        <a href="aboutus.php" class="he">About us</a>
        <a href="logout.php" class="he">Log Out</a>

</div>
<div>
<table>
<tr>
<th>Sender acno</th>
<th>Sender name</th>
<th>Reciever acno</th>
<th>Reciever name</th>
<th>Amount</th>
<th>Time</th>
<th>Type Of Transaction</th>
</tr>
<?php
include 'connection.php';
$user=$_SESSION["acno"];
$query="SELECT * FROM `transactions` WHERE senderid='$user'";
$result=mysqli_query($my_sql,$query);
while($row=mysqli_fetch_assoc($result))
{
    echo'<tr>
        <td>'.$row["senderid"].'</td>'.
        '<td>'.$row["sendername"].'</td>'.
        '<td>'.$row["recieverid"].'</td>'.
        '<td>'.$row["recievername"].'</td>'.
        '<td>'.$row["amount"].'</td>'.
        '<td>'.$row["time"].'</td>'.
        '<td>'.$row["Transaction Type"].'</td>'.
    '</tr>';
}
?>
</table>
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
