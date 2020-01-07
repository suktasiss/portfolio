<?php
require_once 'includes/twig.php';

$template = $twig->load('add_movie.html');
echo $template->render(['admin' => $admin, 'title' => 'Добавить Фильм']);
