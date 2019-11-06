<?php
  include('config.php');
  session_start();
  require('login-check.php');
  login_check();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Кино</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/master.css">
  <link rel="stylesheet" href="https://use.typekit.net/gud4xsb.css">
  <link rel="stylesheet" href="assets/css/popup.css">

 </head>
<body>

  <header>
    <div class="container-fluid">
      <div class="row">
        <div class="title col-md-2">
                <a href="dashboard.php">ADMIN</a>
            </div>
          
          <div class="title align-self-center col-md-9">
            <div class="title-text d-xl-block d-sm-none">
              MOVIE BOOKING SYSTEM
            </div>    
          </div>

          <div class="row enter align-self-center">
            <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] != ""){ ?>
              <ul>
                <li class="dropdown"> 
                <a href="#" data-toggle="dropdown" class="dropdown-toggle"><?= $_SESSION['admin']?></a>
                <ul class="dropdown-menu">
                  <li><a href="logout.php">Выйти</a></li>
                  <li><a href="#">Покупки</a></li>
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
                

          </div>
      </div>
      </div>
  </header>