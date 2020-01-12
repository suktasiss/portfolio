<?php
require_once 'includes/Twig.php';


class LogsController extends Base{

    public $twig;
    public $logs;

    public function __construct()
    {
        
        $this->twig = new Twig();

        $PDOWrap = new PDOWrap();
        $pdo = $PDOWrap->getPDO();
        
        $logsraw = $pdo->query("select * from user_history");
        $this->logs = $logsraw->fetchAll();
    }

    
    public function draw()
    {
        $template = $this->twig->load('logs.html');
        echo $template->render(['admin' => $this->getAdmin(), 'title' => 'Логи','items' => $this->logs]);

    }
}
