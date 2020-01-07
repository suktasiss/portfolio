<?php 
// Скрипт проверяет, зарегистрирован ли уже пользователь и отправляет результат в форму регистрации при помощи AJAX
// В качестве уникальных данных выступают логин и телефон, если логин или телефон уже заняты, пользватель увидит ошибку

require_once 'config.php';
require_once 'regexp.php';



// Проверка имени пользователя

if (isset($_POST['username_check'])) {
    $username = $_POST['username'];
    if(!preg_match(user, $username))
        exit();
    $sql = "select * from users where login='$username'";
    $results = $pdo->query($sql);

    if ($results && count($results->fetchAll()) > 0) {
        echo "taken";	
    }else{
        echo 'not_taken';
    }
    exit();
}

// Проверка телефона пользователя

if (isset($_POST['phone_check'])) {
    $phone = $_POST['phone'];
    if(!preg_match(phone, $phone))
        exit();
    $results = $pdo->query("select * from users where contact_number=$phone");
    if (count($results->fetchAll()) > 0) {
        echo "taken";	
    }else{
        echo 'not_taken';
    }
    exit();
}

// Сохранение пользователя в случае если телефон и логин уникальны

if (isset($_POST['save'])) {
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    if(!preg_match(phone, $phone) || !preg_match(user, $username) || !preg_match(password,$password))
        exit();
    $sql = "select * from users where login='$username'";
    $results = $pdo->query($sql);
      
    if(count($results->fetchAll()) > 0) {
        echo "exists";}
    else{
        $pass = md5($password);
        $sql = "insert into users(login, password, contact_number) values ('$username', '$pass', $phone)";
        $pdo->query($sql);
        echo 'Saved!';
        exit();
    }
}
