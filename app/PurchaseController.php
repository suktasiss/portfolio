<?php

require_once 'includes/Twig.php';
require_once 'includes/Date.php';


class PurchaseController extends Base
{

    public $twig;

    public $movie;
    public $theater;
    public $seance;
    public $date;
    public $max;

    public function __construct()
    {
        login_check(true);
        
        $this->twig =  new Twig();

        $PDOWrap = new PDOWrap();
        $pdo = $PDOWrap->getPDO();
        
        // получение параметров запроса

        $id = intval($_GET['id']);
        $theater_id = intval($_GET['theater']);

        // Считывание сущностей из БД

        $seanceraw = $pdo->query("select * from seances where id=$id");
        $this->seance= $seanceraw->fetch();

        $movie_id = $this->seance['movie_id'];
        $movieraw = $pdo->query("select * from movies where id=$movie_id");
        $this->movie = $movieraw->fetch();

        $theaterraw = $pdo->query("select * from theaters where id=$theater_id");
        $this->theater = $theaterraw->fetch();

        $this->constructDate();
        
    }


    
    public function draw()
    {
        
        // загрузка шаблона

        $template = $this->twig->load('purchase.html');
        echo $template->render(['movie' => $this->movie, 'user' => $this->getUser(), 'title' => 'Билеты', 'date' => $this->date, 'theater' => $this->theater, 'seance' => $this->seance, 'max' => $this->max]);
    }

    

    // Сборка даты сеанса и максимума мест
    public function constructDate()
    {

        $day = Date::getDay($this->seance['showtime']);
        $month = Date::getMonth($this->seance['showtime']);
        $time = Date::getTime($this->seance['showtime']);
        $this->date = ($day . " " . Date::monthByNumber($month)) . " в " . $time;
        
        $this->max = $this->seance['free_space'] > 5 ? 5 : $this->seance['free_space'];
    }   
}
