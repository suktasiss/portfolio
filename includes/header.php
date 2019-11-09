<?php
  include('config.php');
  session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Кино</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="assets/css/modal.css">
  <link rel="stylesheet" href="https://use.typekit.net/gud4xsb.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 </head>
<body>

		<nav class="navbar navbar-expand-md">
        <div class="container-fluid">
          <div class="row">
            <div class="logo">
                <a href="#"><img src="assets/images/glasses.png" height="20"></a>
            </div>
            <div class="title">
                <a href="index.php">CINEMANIA</a>
            </div>
          </div>

          

          <div class="row enter">
            <?php if(isset($_SESSION['user']) && $_SESSION['user'] != ""){ ?>
              <ul>
                <li class="dropdown"> 
                <a href="#" data-toggle="dropdown" class="dropdown-toggle"><?= $_SESSION['user']?></a>
                <ul class="dropdown-menu">
                  <li><a href="logout.php">Выйти</a></li>
                  <li><a href="tickets.php">Покупки</a></li>
                </ul>
              </ul>
            <?php } else { ?>
              
            <div class="main">
              <div class="panel">
                  <a href="#login_form" id="login_pop">Войти</a>
              </div>

            </div>


            <?php }?>

            <a href="#" class="overlay" id="login_form"></a>
                <div class="popup">
                  <form>
                    <div id="error_msg"></div>
                    <div>
                        <label for="login">Логин</label>
                        <input type="text" name="login" value="" id="username"
                        pattern="[a-zA-z0-9]*" />
                        <span></span>
                    </div>
                    <div>
                        <label for="password">Пароль</label>
                        <input type="password" name="password" value="" id="password" 
                        pattern="[0-9a-zA-Z]*"/>
                        <span></span>
                    </div>
                    <div class="button-popup">
                      <button type="button" class="button-form" id="log_btn">Войти</button>
                    </div>
                    <div class="nologin">
                      <a href="register.php">регистрация</a>
                    </div>
                    
                    
                  </form>
                    <a class="close" href="#close"></a>
                  </div>
                </div>
          </div>
      </div>

    </nav>