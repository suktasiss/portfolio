<?php

require_once 'includes/Twig.php';



class RegisterController extends Base
{

    public $twig;public function __construct()
    {
        login_check(false);
        $this->twig =  new Twig();
    }
    
    public function draw()
    {
        $template = $this->twig->load('register.html');
        echo $template->render(['user' => $this->getUser(), 'title' => 'Регистрация']);
    }
}
