<?php
require_once 'includes/twig.php';

$items=mysqli_query($con,"select * from user_history");
$arr = array();
while($item = mysqli_fetch_array($items)){
    array_push($arr,$item);
}

$template = $twig->load('logs.html');
echo $template->render(['admin' => $admin, 'title' => 'Логи','items' => $arr]);
