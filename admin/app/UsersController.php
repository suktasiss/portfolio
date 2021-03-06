<?php
require_once 'includes/Twig.php';

class UsersController extends Base
{
    public $twig;
    public $users;

    public function __construct()
    {    
        $this->twig = new Twig();

        $PDOWrap = new PDOWrap();
        $pdo = $PDOWrap->getPDO();

        $numb = isset($_GET['numb']) ? $_GET['numb'] : 0;
        $page = new Pager(Base::PAGES_NUMBER,$numb);
        
        $usersraw = $pdo->query("select * from users limit $page->start, $page->limit");
        $this->users = $usersraw->fetchAll();
    }
    
    public function draw()
    {
        $template = $this->twig->load('users.html');
        echo $template->render(['admin' => $this->getAdmin(), 'title' => 'Пользователи','items' => $this->users]);
    }
}
