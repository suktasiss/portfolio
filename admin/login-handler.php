<?php
	session_start();
    require_once 'includes/config.php';
    extract($_POST);
    $password = md5($password);
    $arr = mysqli_query($con,"select * from admins where login='$login' and password='$password'");
    $obj = mysqli_fetch_array($arr);
    if($obj > 0){
    	$_SESSION['admin'] = $obj['login'];
	    header('location:dashboard.php');
    }
    else
        header('location:error.php');
?>