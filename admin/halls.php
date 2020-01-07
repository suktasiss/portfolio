<?php
require_once 'includes/twig.php';

$itemsraw = $pdo->query("select * from halls");
$arr = $itemsraw->fetchAll();

$theatersraw = $pdo->query("select * from theaters;"); 
$theaters = array();
while($item = $theatersraw->fetch()){
    $theaters[$item['id']] = $item['name'];
}

$template = $twig->load('halls.html');
echo $template->render(['admin' => $admin, 'title' => 'Залы','items' => $arr,
'theaters' => $theaters]);
