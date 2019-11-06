<?php 
	session_start();
	$_SESSION['admin']="";
	header('location:index.php');
?>