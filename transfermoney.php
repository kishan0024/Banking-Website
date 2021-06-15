<?php

include 'connection.php';
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
// echo'check2';
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $moneysend=$_POST["send"];
    $id=$_SESSION["acno"];
    $reciever=$_POST["reciever"];
    $user=$_SESSION["username"];
    $query="SELECT * FROM `accountdetails` WHERE username='$user'";
    $result=mysqli_query($my_sql,$query);
    // echo 'check1';
    if(mysqli_num_rows($result) == 1)
    {   
        while ($row = mysqli_fetch_assoc($result)) 
         {   
            if ($row["balance"]>=$moneysend) 
            {   //deducting money from sender 
                $q="UPDATE `accountdetails` SET `balance`=balance-$moneysend WHERE username='$user'";
                $result1=mysqli_query($my_sql,$q);
                $errormsg="succesfully sent money ".$money." to ".$reciever."!";
                //adding money to reciever
                $qe="UPDATE `accountdetails` SET `balance`=balance+$moneysend WHERE username='$reciever'";
                $result2=mysqli_query($my_sql,$qe);
                //keeping track of transactions
                $query="SELECT * FROM `accountdetails` WHERE username='$reciever'";
                $result3=mysqli_query($my_sql,$query);
                $row1= mysqli_fetch_assoc($result3);
                $recieverid=$row1["acno"];
                //inserting into database
                $que="INSERT INTO `transactions`(`senderid`, `sendername`, `recieverid`, `recievername`, `amount`, `time`, `Transaction Type`) VALUES ('$id','$user','$recieverid','$reciever','$moneysend',CURRENT_TIMESTAMP,'Sent')";
                $que1="INSERT INTO `transactions`(`senderid`, `sendername`, `recieverid`, `recievername`, `amount`, `time`, `Transaction Type`) VALUES ('$recieverid','$reciever','$id','$user','$moneysend',CURRENT_TIMESTAMP,'recieved')";
                $result4=mysqli_query($my_sql,$que);
                $result5=mysqli_query($my_sql,$que1);
                header("location:main.php?status2=$errormsg");
            }
            else{
                $errormsg = "Not Enough Money!";
                header("location:main.php?status2=$errormsg");
            }    
          }
       
    
    }
    else
    {
        $status="Some Error occured contact administrator";
        header("location:main.php?status2=$status");
    }
}
   
?>