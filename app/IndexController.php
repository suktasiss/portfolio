<?php
require_once 'includes/Twig.php';

class IndexController extends Base
{

    public $movies;
    public $twig;
    public $pdo;
    
    public function __construct()
    {
        $this->twig =  new Twig();

        $PDOWrap = new PDOWrap();
        $this->pdo = $PDOWrap->getPDO();
        
        
        $this->movies = $this->pdo->query('select * from movies');
    }

    public function draw()
    {
        $template = $this->twig->load('index.html');

        echo $template->render(['movies' => $this->movies->fetchAll(), 'user' => $this->getUser(), 'title' => 'Кино']);
    }
}
