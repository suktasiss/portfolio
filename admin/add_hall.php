<?php
require_once 'includes/twig.php';

$itemsraw = $pdo-query("select * from theaters");
$arr = $itemsraw->fetchAll();

$template = $twig->load('add_hall.html');
echo $template->render(['admin' => $admin, 'title' => 'Добавить Зал','items' => $arr]);
