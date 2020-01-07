<?php
require_once 'includes/twig.php';

$items = $pdo->query("select * from seances");
$arr = $items->fetchAll();

$moviesraw = $pdo->query("select * from movies"); 
$movies = array();

while($item = $moviesraw->fetch()){
     $movies[$item['id']] = $item['title'];
}

$template = $twig->load('seances.html');
echo $template->render(['admin' => $admin, 'title' => 'Сеансы','items' => $arr, 'movies' => $movies]);
