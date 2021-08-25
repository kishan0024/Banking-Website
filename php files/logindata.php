<?php
 include 'connection.php';
 if(!isset($_SESSION)) 
 { 
     session_start(); 
 } 
if($_SERVER["REQUEST_METHOD"] == "POST")
{
 

  $user=$_POST["uname"];
  $pass=$_POST["pass"];
  
  $query="SELECT * FROM `accountdetails` WHERE username='$user' ";
  $result=mysqli_query($my_sql,$query);
  if(mysqli_num_rows($result) == 1){
    // echo'CHECK';
      while ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($pass, $row['password'])) {
          // echo 'check2';
          $_SESSION["acno"]=$row["acno"];
          $_SESSION["username"]=$row["username"];
          $_SESSION["balance"]=$row["balance"];
          $_SESSION["mail"]=$row["email"];
            
            header("Location:main.php");
        }
        else{
            $errormsg = "Email or Password is invalid";
            header("location:login.php?status=$errormsg");
        }    
      }
    }
    else{
      $errormsg = "No user found on this username";
      header("location:login.php?status=$errormsg");
    } 
}

?>