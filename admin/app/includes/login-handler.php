<?php

// Скрипт отвечает за авторизацию администратора

require_once '../../../app/includes/PDOWrap.php';
require_once '../../../vendor/autoload.php';


$PDOWrap = new PDOWrap();
$pdo = $PDOWrap->getPDO();

session_start();

extract($_POST);

$adminraw = $pdo->query("select * from admins where login='$login'");
$admin = $adminraw->fetch();

if($admin > 0 && \PHPassLib\Hash\BCrypt::verify($password, $admin['password'])){
    $_SESSION['admin'] = $admin['login'];
    header('location:../../web/dashboard.php');
}
else
    header('location:error.php');
