<?php

require_once 'includes/twig.php';
require_once 'includes/theater.php';
require_once 'includes/seances.php';
require_once 'includes/seance.php';

$template = $twig->load('movie.html');
$movie_id = intval($_GET['id']);


$movieraw = $pdo->query("select * from movies where id=$movie_id");
$movie = $movieraw->fetch();

$theatersraw = $pdo->query("select * from theaters where theaters.id in(select theater_id from halls h join seances s on h.id=s.hall_id and s.movie_id = $movie_id) order by theaters.id;");

$theaters = array();
while($item = $theatersraw->fetch()){
    $th = new Theater($item['id'],$item['name'],$item['address']);
    $th->seances = Seances::constructData($th->id,$pdo,$movie_id);
    array_push($theaters,$th);
}


echo $template->render(['user' => $user, 'title' => $movie['title'], 'movie' => $movie, 'theaters' => $theaters]);
