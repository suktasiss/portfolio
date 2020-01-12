<?php

require_once 'includes/Twig.php';


class IndexController extends Base{

    
    public $twig;

    public function __construct()
    {
        $this->twig = new Twig();
         
        if(isset($_SESSION['admin']) && strlen($_SESSION['admin'])!=0)
            header("Location: dashboard.php");

    }

    public function draw()
    {
        $template = $this->twig->load('index.html');
        echo $template->render();
    }
}
