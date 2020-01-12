<?php
require_once 'includes/Twig.php';


class SeancesController extends Base{

    public $twig;
    public $movies;
    public $seances;

    public function __construct()
    {    
        $this->twig = new Twig();

        $PDOWrap = new PDOWrap();
        $pdo = $PDOWrap->getPDO();
        
        $seancesraw = $pdo->query("select * from seances");
        $this->seances = $seancesraw->fetchAll();

        $moviesraw = $pdo->query("select * from movies"); 
        $this->movies = array();

        while($item = $moviesraw->fetch()){
            $this->movies[$item['id']] = $item['title'];
        }
    }
    
    public function draw()
    {
        $template = $this->twig->load('seances.html');
        echo $template->render(['admin' => $this->getAdmin(), 'title' => 'Сеансы','items' => $this->seances, 'movies' => $this->movies]);

    }
}
