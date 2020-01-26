<?php
require_once 'includes/Twig.php';


class MoviesController extends Base
{

    public $twig;
    public $movies;

    public function __construct()
    {
        
        $this->twig = new Twig();

        $PDOWrap = new PDOWrap();
        $pdo = $PDOWrap->getPDO();

        $numb = isset($_GET['numb']) ? $_GET['numb'] : 0;
        $page = new Pager(Base::PAGES_NUMBER,$numb);
        
        $moviesraw = $pdo->query("select * from movies limit $page->start, $page->limit");
        $this->movies = $moviesraw->fetchAll();
    }

    
    public function draw()
    {
        $template = $this->twig->load('movies.html');
        echo $template->render(['admin' => $this->getAdmin(), 'title' => 'Фильмы','items' => $this->movies]);
    }
}
