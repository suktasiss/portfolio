<?php
require_once 'includes/twig.php';

$hallsraw = mysqli_query($con,"select * from halls");
$movieraw = mysqli_query($con,"select * from movies");

$movies = array();
while($item = mysqli_fetch_array($movieraw)){
    array_push($movies,$item);
}

$halls = array();
while($item = mysqli_fetch_array($hallsraw)){
    array_push($halls,$item);
}


$template = $twig->load('add_seance.html');
echo $template->render(['admin' => $admin, 'title' => 'Добавить Сеанс','halls' => $halls, 'movies' => $movies]);
