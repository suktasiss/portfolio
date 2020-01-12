<?php
require_once 'includes/Twig.php';


class MoviesController extends Base{

    public $twig;
    public $movies;

    public function __construct()
    {
        
        $this->twig = new Twig();

        $PDOWrap = new PDOWrap();
        $pdo = $PDOWrap->getPDO();
        
        $moviesraw = $pdo->query("select * from movies");
        $this->movies = $moviesraw->fetchAll();
    }

    
    public function draw()
    {
        $template = $this->twig->load('movies.html');
        echo $template->render(['admin' => $this->getAdmin(), 'title' => 'Фильмы','items' => $this->movies]);
    }
}
