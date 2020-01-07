<?php

// Скрипт инициализирует шаблонизатор

require_once '../vendor/autoload.php';
require_once 'config.php';
require_once 'login-check.php';

session_start();
login_check();


$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../views');
$twig = new \Twig\Environment($loader, [
    'cache' => __DIR__ . '/../cache',
    'auto_reload' => true]);
$flag = false;
$admin = "";
if(isset($_SESSION['admin']) && $_SESSION['admin'] !=""){
    $admin = $_SESSION['admin'];
    $flag = true;
}
