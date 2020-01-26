<?php

require_once 'includes/Twig.php';


class AddHallController extends Base
{

    public $twig;
    public $theaters;

    public function __construct()
    {
        
        $this->twig = new Twig();

        $PDOWrap = new PDOWrap();
        $pdo = $PDOWrap->getPDO();

        
        $itemsraw = $pdo->query("select * from theaters");
        $this->theaters = $itemsraw->fetchAll();        
    }

    
    public function draw()
    {
        $template = $this->twig->load('add_hall.html');
        echo $template->render(['admin' => $this->getAdmin(), 'title' => 'Добавить Зал','items' => $this->theaters]);
    }
}
