<?php
require_once 'includes/Twig.php';


class TheatersController extends Base
{

    public $twig;
    public $theaters;

    public function __construct()
    {    
        $this->twig = new Twig();

        $PDOWrap = new PDOWrap();
        $pdo = $PDOWrap->getPDO();

        $numb = isset($_GET['numb']) ? $_GET['numb'] : 0;
        $page = new Pager(Base::PAGES_NUMBER,$numb);

        $theatersraw = $pdo->query("select * from theaters limit $page->start, $page->limit");
        $this->theaters = $theatersraw->fetchAll();
    }

    
    public function draw()
    {
        $template = $this->twig->load('theaters.html');
        echo $template->render(['admin' => $this->getAdmin(), 'title' => 'Кинотеатры','items' => $this->theaters]);
    }
}
