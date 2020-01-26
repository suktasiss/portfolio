<?php

abstract class Base{

    // Number of items in page
    const PAGES_NUMBER = 10;
        
    public abstract function __construct();
    abstract public function draw();

    public function getUser()
    {
        if(isset($_SESSION['user'])){
            return $_SESSION['user'];
        }
        return null;
    }

    public function getAdmin()
    {
        if(isset($_SESSION['admin'])){
            return $_SESSION['admin'];
        }
        return null;
    }
}
