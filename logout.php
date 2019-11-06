<?php 
	include('includes/config.php');
	session_start();
	$id = $_SESSION['id'];
	mysqli_query($con,"insert into user_history(user_id,event) values($id,'logout')");
	session_destroy();
	header('location:index.php');
?>