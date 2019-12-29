<?php
require_once 'includes/twig.php';

$items=mysqli_query($con,"select * from seances");
$arr = array();
while($item = mysqli_fetch_array($items)){
    array_push($arr,$item);
}

$moviesraw=mysqli_query($con,"select * from movies"); 
$movies = array();
while($item = mysqli_fetch_array($moviesraw)){
    $movies[$item['id']] = $item['title'];
}

$template = $twig->load('seances.html');
echo $template->render(['admin' => $admin, 'title' => 'Сеансы','items' => $arr, 'movies' => $movies]);
