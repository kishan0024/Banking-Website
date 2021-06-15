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
<?php 

 
     
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
<hr style="width:90%; margin:1rem; color:yellow">
<div class="intro">
    <div id="firstline">
    Stay Connected to Your Account
    <br> 24/7.
    </div>
    <div id="secondline">
    Secure online and mobile banking for your everyday financial <br>
    needs during these challenging times.
    </div>
    <div>
        <button id="learnmore">Learn More!</button>
    </div>
</div>
<hr style="width:90%; margin:1rem; color:yellow">

<div id="heading1">
       <div id="greeting">
       

    Hello! <?php echo $_SESSION["username"]?>, 
    <br>
    Welcome To The Sparks Bank,
    <br>
    Hope you Are Doing good!
        
       
       </div>
       <div id="info">
            Name:  <?php echo $_SESSION["username"]?>
            <br>
            Balance:  
            <?php
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
             ?>
            <br>
            Mail Id: <?php echo $_SESSION["mail"] ?>
       </div>

</div>

<hr style="width:90%; margin:1rem; color:yellow">
<div id="banking_head">
    Banking
</div>
<div>
<?php 
         if(isset($_GET["status"]))
         {
            // header("location:main.php");
            echo '<script>alert("Successfully Deposited")</script>';
         }
         if(isset($_GET["status2"]))
         {
            // header("location:main.php");
            echo '<script>alert("'.$_GET["status2"].'")</script>';
         }
        //  echo '<script>alert("Successfully Deposited")</script>';
 ?>
</div>
<!-- banking section -->
<div id="banking">

<div class="b_inner" onclick="depclick('popupd'); return false;">
   <a href="" id="dep" > Deposit </a>
    <img src="deposit.png" alt="" class="img_fit">
</div>
<div class="b_inner" onclick="withclick('popupw'); return false;">
     <a href="">Withdraw</a>
    <img src="withdrawal.png" alt="" class="img_fit">
</div>
<div class="b_inner" onclick="sendclick('popupsend'); return false;">
     <a href="">Send Money</a>
    <img src="money-transfer.png" alt="" class="img_fit">
</div>
</div>
<hr style="width:90%; margin:1rem; color:yellow">

<!-- pop up window -->
<div id="popupd">
   
      <div id="depositcontent">
      <div id="close" onclick="depclose('popupd'); return false;">
        close
      </div>
        <form  action="deposit.php" method="post" name="depositmoney">
            <div style="font-size:1.6rem; padding:1rem">
            <strong>Deposit Money</strong>
            </div>
           <div>
           Current Balance: <?php
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
             ?>
           </div>
            <div>
            <label for="deposit">Enter Money to Deposit:</label>
            <input type="number" name="deposit" id="deposit" placeholder="enter money to deposit">
            </div>
            <div>
                <input type="submit" id="submitdeposit" value="Deposit">
            </div>
        </form>
      

      </div>
</div>

<!-- pop up window 2-->
<div id="popupw">
   
      <div id="withdrawcontent">
      <div id="close"  onclick="withclose('popupw'); return false;">
        close
      </div>
        <form action="withdraw.php" method="post" name="withdrawmoney">
            <div style="font-size:1.6rem; padding:1rem">
            <strong>Withdraw Money</strong>
            </div>
           <div>
           Current Balance: <?php
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
             ?>
           </div>
            <div>
            <label for="withdraw">Enter Money to Withdraw:</label>
            <input type="number" name="withdraw" id="withdraw" placeholder="enter money to withdraw">
            </div>
            <div>
                <input type="submit" id="submitwithdraw" value="Withdraw">
            </div>
           

        </form>

      </div>
</div>
<!-- pop up 3 -->
<div id="popupsend">
   
      <div id="sendcontent">
      <div id="close"  onclick="sendclose('popupsend'); return false;">
        close
      </div>
        <form action="transfermoney.php" method="post" name="sendmoney">
            <div style="font-size:1.6rem; padding:1rem">
            <strong>Send Money</strong>
            </div>
           <div>
           Current Balance:<?php
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
             ?>
           </div>
           <div style="margin:1rem;">  
           <label for="reciever">Enter Name Of Reciever:</label>
            <select name="reciever" id="reciever">
            <?php 
                include 'connection.php';
                $a=$_SESSION["username"];
                $query="SELECT * FROM `accountdetails` WHERE username!='$a'";
                $result=mysqli_query($my_sql,$query);
                if(!$result)
                {
                    echo "Error ".$query."<br>".mysqli_error($my_sql);
                }
                while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <option value="<?php echo $row['username'];?>" >
                        <?php echo $row['username'] ;?> 
                    </option>
                    <?php 
                        } 
                    ?>
            
            </select>
           </div>
            <div style="margin:1rem;">
            <label for="send">Enter Money to Send:</label>
            <input type="number" name="send" id="send" placeholder="enter money to send">
            </div>
            <div>
                <input type="submit" id="submitsend" value="Send Money">
            </div>
           

        </form>

      </div>
</div>
<!-- mission and vision statement -->
<div class="mvs">
    <div id="logo11">
        <img src="compliant.png" alt="logo" id="logo2">
    </div>
    Mission: <br>
    To create a better everyday life for the many people.
    <br>
    vision: 
    <br> be a financially viable, independent community bank that is committed to improving the quality of life of the communities we serve. To earn the loyalty of employees, customers and the community by operating with integrity and fairness at all times.
</div>
<hr style="width:90%; margin:1rem; color:yellow">
<!-- arrow key for taking page to top -->
<div id="upkey">
    <a href="#wrap"><img src="up-arrow.svg" alt="Top"></a>
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
<script>
    function depclick(id)
    {
        document.getElementById(id).style.display="flex";
        console.log("efad");
    }
    function depclose(id)
    {
        document.getElementById(id).style.display="none";
        console.log("efad");
    }
    function withclick(id)
    {
        document.getElementById(id).style.display="flex";
        console.log("efad");
    }
    function withclose(id)
    {
        document.getElementById(id).style.display="none";
        console.log("efad");
    }
    function sendclick(id)
    {
        document.getElementById(id).style.display="flex";
        console.log("efad");
    }
    function sendclose(id)
    {
        document.getElementById(id).style.display="none";
        console.log("efad");
    }
    
</script>
</body>
</html>
