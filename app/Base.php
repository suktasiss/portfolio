<?php

abstract class Base
{
    
    public abstract function __construct();
    abstract public function draw();

    public function getUser()
    {
        if(isset($_SESSION['user'])){
            return $_SESSION['user'];
        }
        return null;
    }
}
