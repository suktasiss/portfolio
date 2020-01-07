<?php
require_once 'includes/twig.php';

$items = $pdo->query("select * from users");
$arr = $items->fetchAll();
    
$template = $twig->load('users.html');
echo $template->render(['admin' => $admin, 'title' => 'Пользователи','items' => $arr]);
