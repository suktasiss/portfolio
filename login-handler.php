<?php
    session_start();
    include 'includes/config.php';
    include 'includes/regexp.php';
    extract($_POST);
    $password = md5($password);

    if(!preg_match(user, $username) || !preg_match(password,$password)){
        header('location:index.php');
    }

    $arr = mysqli_query($con,"select * from users where login='$login' and password='$password'");

    $obj = mysqli_fetch_assoc($arr);
    $userId = $obj['id'];
    if($obj > 0){
    	$_SESSION['user'] = $obj['login'];
        $_SESSION['id'] = $userId;
        mysqli_query($con,"insert into user_history(user_id,event) values($userId,'login')");
	    header('location:index.php');
    }
    else{
        header('location:index.php');
    }
?>