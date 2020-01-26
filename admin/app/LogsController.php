<?php
require_once 'includes/Twig.php';


class LogsController extends Base
{

    public $twig;
    public $logs;

    public function __construct()
    {
        
        $this->twig = new Twig();

        $PDOWrap = new PDOWrap();
        $pdo = $PDOWrap->getPDO();

        $numb = isset($_GET['numb']) ? $_GET['numb'] : 0;
        $page = new Pager(Base::PAGES_NUMBER,$numb);
        
        $logsraw = $pdo->query("select * from user_history where id between $page->start and $page->end");
        $this->logs = $logsraw->fetchAll();
    }

    
    public function draw()
    {
        $template = $this->twig->load('logs.html');
        echo $template->render(['admin' => $this->getAdmin(), 'title' => 'Логи','items' => $this->logs]);

    }
}
