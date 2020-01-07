<?php
require_once 'includes/twig.php';
require_once 'includes/dashboard-helper.php';


// Получаем количество сущностей из БД

$movies = getEntryNumber('movies',$pdo);
$seances = getEntryNumber('seances',$pdo);
$theaters = getEntryNumber('theaters',$pdo);
$halls = getEntryNumber('halls',$pdo);
$users = getEntryNumber('users',$pdo);
$logs = getEntryNumber('user_history',$pdo);

$template = $twig->load('dashboard.html');

echo $template->render(['admin' => $admin, 'title' => 'Главная','movies' => $movies, 'seances' => $seances, 'theaters' => $theaters, 'halls' => $halls, 'users' => $users, 'logs' => $logs]);
