<?php 

// Скрипт отвечает за выход пользователями из системы

require_once 'config.php';

session_start();

$id = $_SESSION['id'];
$_SESSION=[];
unset($_COOKIE[session_name()]);
$pdo->query("insert into user_history(user_id,event) values($id,'logout')");

session_destroy();
header('location:../index.php');
