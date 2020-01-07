<?php

require_once 'includes/twig.php';
require_once 'includes/date.php';

login_check(true);

// загрузка шаблона

$template = $twig->load('purchase.html');

// получение параметров запроса
$id = intval($_GET['id']);
$theater_id = intval($_GET['theater']);

// Считывание сущностей из БД

$seanceraw = $pdo->query("select * from seances where id=$id");
$seance= $seanceraw->fetch();

$movie_id = $seance['movie_id'];
$movieraw = $pdo->query("select * from movies where id=$movie_id");
$movie = $movieraw->fetch();

$theaterraw = $pdo->query("select * from theaters where id=$theater_id");
$theater = $theaterraw->fetch();


// Сборка даты сеанса 

$day = Date::getDay($seance['showtime']);
$month = Date::getMonth($seance['showtime']);
$time = Date::getTime($seance['showtime']);
$date = ($day . " " . Date::monthByNumber($month)) . " в " . $time;
$max = $seance['free_space'] > 5 ? 5 : $seance['free_space'];


echo $template->render(['movie' => $movie, 'user' => $user, 'title' => 'Билеты', 'date' => $date, 'theater' => $theater, 'seance' => $seance, 'max' => $max]);
