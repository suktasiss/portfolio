<?php

// Скрипт инициализирует шаблонизатор

require_once '../../vendor/autoload.php';
require_once '../../app/includes/PDOWrap.php';
require_once 'login-check.php';


class Twig {

    public $twig;
    
    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ .'/../../views');
        $this->twig = new \Twig\Environment($loader, [
            'cache' => __DIR__ . '/../../cache',
            'auto_reload' => false]);

    }

    public function load($template)
    {
        return $this->twig->load($template);
    }

}
