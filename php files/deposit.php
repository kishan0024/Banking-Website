<?php

include 'connection.php';
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $money=$_POST["deposit"];
    $user=$_SESSION["username"];
    $id=$_SESSION["acno"];
    $query="SELECT * FROM `accountdetails` WHERE username='$user'";
    $result=mysqli_query($my_sql,$query);
    if(mysqli_num_rows($result) == 1)
    {
        $q="UPDATE `accountdetails` SET `balance`=balance+$money WHERE username='$user'";
        $result1=mysqli_query($my_sql,$q);
        $status="succesfully Deposited";

        $que="INSERT INTO `transactions`(`senderid`, `sendername`, `recieverid`, `recievername`, `amount`, `time`, `Transaction Type`) VALUES ('$id','$user',NULL,NULL,'$money',CURRENT_TIMESTAMP,'deposit')";
        $result2=mysqli_query($my_sql,$que);
        header("location:main.php?status=$status");
    }
    else{
        $status="Some Error occured contact administrator";
        header("location:main.php?status=$status");
    }
}
   
?>