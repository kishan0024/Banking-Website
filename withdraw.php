<?php

include 'connection.php';
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $money=$_POST["withdraw"];
    $user=$_SESSION["username"];
    $id=$_SESSION["acno"];
    $query="SELECT * FROM `accountdetails` WHERE username='$user'";
    $result=mysqli_query($my_sql,$query);
    if(mysqli_num_rows($result) == 1)
    {   
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row["balance"]>=$money) 
            {
                $q="UPDATE `accountdetails` SET `balance`=balance-$money WHERE username='$user'";
                $result1=mysqli_query($my_sql,$q);

                $que="INSERT INTO `transactions`(`senderid`, `sendername`, `recieverid`, `recievername`, `amount`, `time`, `Transaction Type`) VALUES ('$id','$user',NULL,NULL,'$money',CURRENT_TIMESTAMP,'Withdraw')";
                $result2=mysqli_query($my_sql,$que);
                $errormsg="succesfully withdrawn ".$money." rupees";
                header("location:main.php?status2=$errormsg");
                
            }
            else{
                $errormsg = "Not Enough Money!";
                header("location:main.php?status2=$errormsg");
            }    
          }
       
    }
    else{
        $status="Some Error occured contact administrator";
        header("location:main.php?status2=$status");
    }
}
   
?>