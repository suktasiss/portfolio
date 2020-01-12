<?php
require_once 'includes/Twig.php';


class TheatersController extends Base{

    public $twig;
    public $theaters;

    public function __construct()
    {    
        $this->twig = new Twig();

        $PDOWrap = new PDOWrap();
        $pdo = $PDOWrap->getPDO();
        
        $theatersraw = $pdo->query("select * from theaters");
        $this->theaters = $theatersraw->fetchAll();
    }

    
    public function draw()
    {
        $template = $this->twig->load('theaters.html');
        echo $template->render(['admin' => $this->getAdmin(), 'title' => 'Кинотеатры','items' => $this->theaters]);
    }
}
