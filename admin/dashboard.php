<?php
require_once 'includes/twig.php';
require_once 'includes/dashboard-helper.php';

$movies = getEntryNumber('movies',$con);
$seances = getEntryNumber('seances',$con);
$theaters = getEntryNumber('theaters',$con);
$halls = getEntryNumber('halls',$con);
$users = getEntryNumber('users',$con);
$logs = getEntryNumber('user_history',$con);



$template = $twig->load('dashboard.html');
echo $template->render(['admin' => $admin, 'title' => 'Главная','movies' => $movies, 'seances' => $seances, 'theaters' => $theaters, 'halls' => $halls, 'users' => $users, 'logs' => $logs]);
