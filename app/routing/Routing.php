<?php

class Routing {

    function __construct(){
        $this->routes = explode('/', $_SERVER['REQUEST_URI']);
        if(count($this->routes) == 5) {
            session_start();
            $vals = explode('.', $this->routes[4]);
            $vals[0] = $vals[0] == "" ? 'index' : $vals[0];
            $class = ucfirst($vals[0]) . 'Controller';
            $controller = new $class();
            $controller->draw();
            return;
        }
    }
}
