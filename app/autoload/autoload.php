<?php

spl_autoload_register(function (string $className) {
    $class = __DIR__ . '/../' . $className . '.php';
    include $class;
    if(!class_exists($className,false)){
       echo 'Данной страницы не существует';
       exit();
    }
});
