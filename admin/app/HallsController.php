<?php
require_once 'includes/Twig.php';


class HallsController extends Base
{

    public $twig;
    public $theaters;
    public $halls;

    public function __construct()
    {    
        $this->twig = new Twig();

        $PDOWrap = new PDOWrap();
        $pdo = $PDOWrap->getPDO();

        $numb = isset($_GET['numb']) ? $_GET['numb'] : 0;
        $page = new Pager(Base::PAGES_NUMBER,$numb);
        
        $hallsraw = $pdo->query("select * from halls order by theater_id, id LIMIT $page->start, $page->limit");
        $this->halls = $hallsraw->fetchAll();

        $theatersraw = $pdo->query("select * from theaters;"); 
        $this->theaters = array();
        while($item = $theatersraw->fetch()){
            $this->theaters[$item['id']] = $item['name'];
        }
    }

    
    public function draw()
    {
        $template = $this->twig->load('halls.html');
        echo $template->render(['admin' => $this->getAdmin(), 'title' => 'Залы','items' => $this->halls, 'theaters' => $this->theaters]);
    }
}
