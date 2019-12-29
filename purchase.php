<?php

require_once 'includes/twig.php';
require_once 'includes/date.php';

login_check(true);

$template = $twig->load('purchase.html');
$id = intval($_GET['id']);
$theater_id = intval($_GET['theater']);
$seancerow = mysqli_query($con,"select * from seances where id=$id");
$seance=mysqli_fetch_array($seancerow);
$movie_id = $seance['movie_id'];
$movierow=mysqli_query($con,"select * from movies where id=$movie_id");
$movie=mysqli_fetch_array($movierow);

$theaterrow=mysqli_query($con,"select * from theaters where id=$theater_id");
$theater = mysqli_fetch_array($theaterrow);

$day = Date::getDay($seance['showtime']);
$month = Date::getMonth($seance['showtime']);
$time = Date::getTime($seance['showtime']);
$date = ($day . " " . Date::monthByNumber($month)) . " в " . $time;
$max = $seance['free_space'] > 5 ? 5 : $seance['free_space'];
echo $template->render(['movie' => $movie, 'user' => $user, 'title' => 'Билеты', 'date' => $date, 'theater' => $theater, 'seance' => $seance, 'max' => $max]);
