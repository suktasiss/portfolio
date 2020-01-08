<?php
    
// Cкрипт отвечает за вход пользователя в систему, при успешном входе заносится запись в логи


require_once '../vendor/autoload.php';
require_once 'config.php';
require_once 'regexp.php';




if (isset($_POST['save'])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!preg_match(user, $username) || !preg_match(password,$password))
        exit();

    // Проверка хэша пароля пароля
    
    
    $results = $pdo->query("select * from users where login='$username'");
    $obj = $results->fetch();
    
    if( $results && $results->rowCount() > 0 &&
        \PHPassLib\Hash\BCrypt::verify($password, $obj['password']))
    {
        $userId = $obj['id'];
        session_start();
        
        $_SESSION['user'] = $obj['login'];
        $_SESSION['id'] = $userId;

        $pdo->query("insert into user_history(user_id,event) values($userId,'login')");

        header('location:../index.php');
    }
    else{
        exit();
    }
}
