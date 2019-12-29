<?php
require_once 'includes/twig.php';

$items = mysqli_query($con,"select * from theaters");

$arr = array();
while($item = mysqli_fetch_array($items)){
    array_push($arr,$item);
}

$template = $twig->load('add_hall.html');
echo $template->render(['admin' => $admin, 'title' => 'Добавить Зал','items' => $arr]);
