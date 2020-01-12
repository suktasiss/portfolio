<?php

require_once '../app/routing/Routing.php';

spl_autoload_register(function (string $className) {
    require_once __DIR__ . '/../app/' . $className . '.php';
});

$obj = new Routing();
