<?php

// Скрипт отвечает за произведения процессы покупки и добавляет новую резервацию в БД

session_start();
require_once 'config.php';
extract($_POST);
$id = intval($id);
$quantity = intval($quantity);
$free = mysqli_query($con,"select * from seances where id=$id");
$seance = mysqli_fetch_array($free);
$free_new = $seance['free_space'] - $quantity;
mysqli_query($con,"update seances set free_space=$free_new where id=$id");

if($seance > 0){
    $userId = $_SESSION['id'];
    $seanceId = $seance['id'];
    mysqli_query($con,"insert into bookings(user_id,seance_id,quantity) values ($userId,$seanceId,$quantity);");
    mysqli_query($con,"insert into user_history(user_id,event) values($userId,'purchase')");
    header('location:../index.php');
}
