<?php

require_once 'includes/Twig.php';
require_once 'includes/Theater.php';
require_once 'includes/Seances.php';
require_once 'includes/Seance.php';


class MovieController extends Base
{

    public $twig;
    public $pdo;
    
    public $theaters;
    public $movie;
   

    public function __construct()
    {
        
        $this->twig =  new Twig();

        $PDOWrap = new PDOWrap();
        $this->pdo = $PDOWrap->getPDO();
        
        $movie_id = intval($_GET['id']);

        $movieraw = $this->pdo->query("select * from movies where id=$movie_id");
        $this->movie = $movieraw->fetch();

        
        $theatersraw = $this->pdo->query("select * from theaters where theaters.id in(select theater_id from halls h join seances s on h.id=s.hall_id and s.movie_id = $movie_id) order by theaters.id;");
        $this->theaters = array();
        while($item = $theatersraw->fetch()){
            $th = new Theater($item['id'],$item['name'],$item['address']);
            $th->seances = Seances::constructData($th->id,$this->pdo,$movie_id);
            array_push($this->theaters,$th);
        }
    }
    
    public function draw()
    {
        $template = $this->twig->load('movie.html');
        
        
        echo $template->render(['user' => $this->getUser(), 'title' => $this->movie['title'], 'movie' => $this->movie, 'theaters' => $this->theaters]);
    }
    
}
