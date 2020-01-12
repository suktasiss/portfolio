<?php
require_once 'includes/Twig.php';
require_once 'includes/dashboard-helper.php';


class DashboardController extends Base{

    public $twig;

    public $halls;
    public $theaters;
    public $movies;
    public $logs;
    public $users;
    public $seances;
    

    public function __construct()
    {
        
        $this->twig = new Twig();

        $PDOWrap = new PDOWrap();
        $pdo = $PDOWrap->getPDO();
        
        // Получаем количество сущностей из БД

        $this->movies = getEntryNumber('movies',$pdo);
        $this->seances = getEntryNumber('seances',$pdo);
        $this->theaters = getEntryNumber('theaters',$pdo);
        $this->halls = getEntryNumber('halls',$pdo);
        $this->users = getEntryNumber('users',$pdo);
        $this->logs = getEntryNumber('user_history',$pdo);
        
    }

    
    public function draw()
    {
        $template = $this->twig->load('dashboard.html');

        echo $template->render(['admin' => $this->getAdmin(), 'title' => 'Главная','movies' => $this->movies, 'seances' => $this->seances, 'theaters' => $this->theaters, 'halls' => $this->halls, 'users' => $this->users, 'logs' => $this->logs]);
    }
    
}
