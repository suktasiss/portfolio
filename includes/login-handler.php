<?php

// Скрипт отвечает за авторизацию пользователя

session_start();
require_once 'config.php';
require_once 'regexp.php';

extract($_POST);
$password = md5($password);


if(!preg_match(user, $username) || !preg_match(password,$password)){
    header('location:index.php');
}

$usersraw = $pdo->query("select * from users where login='$login' and password='$password'");
$obj = $usersraw->fetch();;

$userId = $obj['id'];
if($obj > 0){
    $_SESSION['user'] = $obj['login'];
    $_SESSION['id'] = $userId;
    $pdo->query("insert into user_history(user_id,event) values($userId,'login')");

    header('location:index.php');
}
else{
    header('location:index.php');
}
