<?php

session_start();
require_once 'config.php';

extract($_POST);
$password = md5($password);
$adminraw = $pdo->query("select * from admins where login='$login' and password='$password'");
$admin = $adminraw->fetch();

if($admin > 0){
    $_SESSION['admin'] = $admin['login'];
    header('location:../dashboard.php');
}
else
    header('location:error.php');
