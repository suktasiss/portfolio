<?php
require_once __DIR__ . '/../includes/login-check.php';

// Класс отвечает за маршрутизацию URL запросов

class Routing {

    function __construct(){
        $this->routes = explode('/', $_SERVER['REQUEST_URI']);
        if(count($this->routes) == 6) {

            session_start();

            if(!login_check()){
                $controller = new IndexController();
                $controller->draw();
                return;
            }

            $vals = explode('.', $this->routes[5]);
            $class = ucfirst($vals[0]) . 'Controller';

            
            $controller = new $class();
            $controller->draw();
            
            return;
        }
    }
}
