<?php

require_once 'includes/Twig.php';


class AddMovieController extends Base{

    public $twig;
    public $theaters;

    public function __construct()
    {
        
        $this->twig = new Twig();
      
    }

    
    public function draw()
    {
        $template = $this->twig->load('add_movie.html');
        echo $template->render(['admin' => $this->getAdmin(), 'title' => 'Добавить Фильм']);
    }
}
