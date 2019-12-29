<?php
require_once 'includes/twig.php';


$template = $twig->load('add_theater.html');
echo $template->render(['admin' => $admin, 'title' => 'Добавить Кинотеатр']);
