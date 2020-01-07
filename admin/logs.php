<?php
require_once 'includes/twig.php';

$items = $pdo->query("select * from user_history");
$arr = $items->fetchAll();

$template = $twig->load('logs.html');
echo $template->render(['admin' => $admin, 'title' => 'Логи','items' => $arr]);
