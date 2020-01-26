<?php

require_once 'includes/Twig.php';


class AddSeanceController extends Base
{

    public $twig;
    public $halls;
    public $movies;

    public function __construct()
    {
        
        $this->twig = new Twig();

        $PDOWrap = new PDOWrap();
        $pdo = $PDOWrap->getPDO();
        
        $hallsraw = $pdo->query("select * from halls");
        $moviesraw = $pdo->query("select * from movies");

        $this->movies = $moviesraw->fetchAll();

        $this->halls = $hallsraw->fetchAll();;     
    }

    
    public function draw()
    {
        $template = $this->twig->load('add_seance.html');
        echo $template->render(['admin' => $this->getAdmin(), 'title' => 'Добавить Сеанс','halls' => $this->halls, 'movies' => $this->movies]);
    }
}
