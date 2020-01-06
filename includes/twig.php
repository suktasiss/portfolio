<?php
// Скрипт отвечает за инициилазцию шаблонизатора twig, загружая все шаблоны и определяя директорию для кеша


require_once 'vendor/autoload.php';
require_once 'process-login.php';
require_once 'login-check.php';



session_start();

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../views');
$twig = new \Twig\Environment($loader, [
    'cache' => __DIR__ . '/../cache',
    'auto_reload' => true]);
$flag = false;
$user = "";
if(isset($_SESSION['user']) && $_SESSION['user'] !=""){
    $user = $_SESSION['user'];
    $flag = true;
}
