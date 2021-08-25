<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 


$my_sql=mysqli_connect("localhost","root","","tsfintern");

if($my_sql==FALSE)
{
    die("error! couldnt connect to databse".mysqli_connect_error());
}
else
{
    // echo "connection successful";
}
?>