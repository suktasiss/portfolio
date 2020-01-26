<?php 

// Скрипт отвечает за выход пользователями из системы

require_once 'PDOWrap.php';

session_start();

$PDOWrap = new PDOWrap();
$pdo = $PDOWrap->getPDO();

$id = $_SESSION['id'];
$_SESSION=[];

unset($_COOKIE[session_name()]);
$pdo->query("insert into user_history(user_id,event) values($id,'logout')");

session_destroy();
header('location:../../web/index.php');
