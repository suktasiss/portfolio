<?php
require_once 'includes/twig.php';

$items = $pdo->query("select * from movies");
$arr = $items->fetchAll();

$template = $twig->load('movies.html');
echo $template->render(['admin' => $admin, 'title' => 'Фильмы','items' => $arr]);
