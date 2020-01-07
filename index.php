<?php
require_once 'includes/twig.php';


$template = $twig->load('index.html');
$stmt = $pdo->query('select * from movies');

echo $template->render(['movies' => $stmt->fetchAll(), 'user' => $user, 'title' => 'Кино']);
