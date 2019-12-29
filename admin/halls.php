<?php
require_once 'includes/twig.php';

$items=mysqli_query($con,"select * from halls");
$arr = array();
while($item = mysqli_fetch_array($items)){
    array_push($arr,$item);
}

$theatersraw=mysqli_query($con,"select * from theaters;"); 
$theaters = array();
while($item = mysqli_fetch_array($theatersraw)){
    $theaters[$item['id']] = $item['name'];
}

$template = $twig->load('halls.html');
echo $template->render(['admin' => $admin, 'title' => 'Залы','items' => $arr,
'theaters' => $theaters]);
