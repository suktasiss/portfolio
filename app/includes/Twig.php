<?php
// Скрипт отвечает за инициализацию шаблонизатора twig, загружая все шаблоны и определяя директорию для кеша


require_once '../vendor/autoload.php';
require_once 'PDOWrap.php';
require_once 'login-check.php';

class Twig
{

    public $twig;
    
    public function __construct()
    {

        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../../views');
        $this->twig = new \Twig\Environment($loader, [
            'cache' => __DIR__ . '/../../cache',
            'auto_reload' => false]);
    }

    public function load($template)
    {
        return $this->twig->load($template);
    }

}

