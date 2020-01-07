<?php

// Скрипт отвечает за произведения процессы покупки и добавляет новую резервацию в БД

session_start();
require_once 'config.php';

extract($_POST);
$id = intval($id);
$quantity = intval($quantity);


$free = $pdo->query("select * from seances where id=$id");
$seance = $free->fetch();

// Обновляем количества свободных мест для сеанса

$free_new = $seance['free_space'] - $quantity;
$pdo->query("update seances set free_space=$free_new where id=$id");

// Запись в БД

if($seance > 0){
    $userId = $_SESSION['id'];
    $seanceId = $seance['id'];
    $pdo->query("insert into bookings(user_id,seance_id,quantity) values ($userId,$seanceId,$quantity);");
    $pdo->query("insert into user_history(user_id,event) values($userId,'purchase')");

    header('location:../index.php');
}
