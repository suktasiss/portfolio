<?php

require_once 'includes/twig.php';
require_once 'includes/theater.php';
require_once 'includes/seances.php';
require_once 'includes/seance.php';

$template = $twig->load('movie.html');
$movie_id = intval($_GET['id']);
$movierow=mysqli_query($con,"select * from movies where id=$movie_id");
$movie=mysqli_fetch_array($movierow);

$theatersraw= mysqli_query($con,"select * from theaters where theaters.id in(select theater_id from halls h join seances s on h.id=s.hall_id and s.movie_id = $movie_id) order by theaters.id;");

$theaters = array();
while($item = mysqli_fetch_array($theatersraw)){
    $th = new Theater($item['id'],$item['name'],$item['address']);
    $th->seances = Seances::constructData($th->id,$con,$movie_id);
    array_push($theaters,$th);
}


echo $template->render(['user' => $user, 'title' => $movie['title'], 'movie' => $movie, 'theaters' => $theaters]);
