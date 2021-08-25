<?php
$checkuser=false;

if($_SERVER["REQUEST_METHOD"] == "POST") {

    
$my_sql=mysqli_connect("localhost","root","","tsfintern");

if($my_sql==FALSE)
{
    die("error! couldnt connect to databse".mysqli_connect_error());
}
else
{
    // echo "connection successful";
}

$user=$_POST["uname"];
$pass=$_POST["pass"];
$email=$_POST["email"];
$cpass=password_hash($pass,PASSWORD_DEFAULT);

$qu="SELECT * FROM `accountdetails` WHERE username='$user' ";
$que="SELECT * FROM `accountdetails` WHERE email='$email' ";
$result=mysqli_query($my_sql,$qu);
$result1=mysqli_query($my_sql,$que);
$rows=mysqli_num_rows($result);
$rows1=mysqli_num_rows($result1);

if($rows>0)
{
    $checkuser=true;
   header('location:signup.php?status=true');
}
else if($rows1>0)
{
    $checkuser=true;
    header('location:signup.php?mailstatus=true');
}
else
{   echo 'check';
    $q="INSERT INTO `accountdetails` (`acno`, `username`, `email`, `password`, `balance`) VALUES (NULL, '$user', '$email', '$cpass', '1000')";
    $d=mysqli_query($my_sql,$q);
    echo $d;
    header('location:login.php');
}


}
      
?>