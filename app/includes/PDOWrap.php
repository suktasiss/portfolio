<?php

// Регистрация базы данных

class PDOWrap
{

    public $pdo;
    
    public function __construct()
    {        
        $db_server = 'localhost';		// Server name
        $db_user = 'johan'; 	   		// DB user name
        $db_pass = 'ullarium1'; 		// DB user pass
        $db_name = 'mbs'; 				// DB NAME


        // PDO начало

        $dsn = "mysql:host=$db_server;dbname=$db_name";;

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $db_user, $db_pass, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function getPDO()
    {
        return $this->pdo;
    }
}
