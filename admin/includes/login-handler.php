<?php

// Скрипт отвечает за авторизацию администратора

session_start();
require_once 'config.php';
require_once '../../vendor/autoload.php';

extract($_POST);

$adminraw = $pdo->query("select * from admins where login='$login'");
$admin = $adminraw->fetch();

if($admin > 0 && \PHPassLib\Hash\BCrypt::verify($password, $admin['password'])){
    $_SESSION['admin'] = $admin['login'];
    header('location:../dashboard.php');
}
else
    header('location:error.php');
