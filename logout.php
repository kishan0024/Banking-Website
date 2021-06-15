<?php
	include_once('connection.php');
	session_start();
	session_destroy();
	session_unset($_SESSION['username']);
	session_unset($_SESSION['mail']);
	header("Location:index.php");
?>