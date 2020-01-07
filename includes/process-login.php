<?php 
// скрипт отвечает за вход пользователя в систему

require_once 'config.php';
require_once 'regexp.php';



if (isset($_POST['save'])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(!preg_match(user, $username) || !preg_match(password,$password))
        exit();
    $password = md5($password);
    
    $results = $pdo->query("select * from users where login='$username' and password='$password';");
    if($results && $results->rowCount() > 0){
        
        $obj = $results->fetch();
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
