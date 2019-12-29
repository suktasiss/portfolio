<?php
require_once 'includes/twig.php';

$items = mysqli_query($con,"select * from theaters");


$template = $twig->load('add_movie.html');
echo $template->render(['admin' => $admin, 'title' => 'Добавить Фильм']);
