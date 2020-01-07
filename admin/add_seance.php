<?php
require_once 'includes/twig.php';

$hallsraw = $pdo->query("select * from halls");
$moviesraw = $pdo->query("select * from movies");

$movies = $moviesraw->fetchAll();

$halls = $hallsraw->fetchAll();;

$template = $twig->load('add_seance.html');
echo $template->render(['admin' => $admin, 'title' => 'Добавить Сеанс','halls' => $halls, 'movies' => $movies]);
