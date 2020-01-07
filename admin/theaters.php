<?php
require_once 'includes/twig.php';

$items = $pdo->query("select * from theaters");
$arr = $items->fetchAll();


$template = $twig->load('theaters.html');
echo $template->render(['admin' => $admin, 'title' => 'Кинотеатры','items' => $arr]);
