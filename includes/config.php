<?php

// Регистрация базы данных


$db_server = '';		// Server name
$db_user = ''; 	   		// DB user name
$db_pass = ''; 		// DB user pass
$db_name = ''; 				// DB NAME


// PDO начало

$dsn = "mysql:host=$db_server;dbname=$db_name";;

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     $pdo = new PDO($dsn, $db_user, $db_pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
