<?php

// функция проверяет, вошёл ли пользователь в систему, если нет, происходит перенаправление на главную страницу. $revers - инверсирует работу функции

function login_check($reverse)
{
	if(isset($_SESSION['user']) && strlen($_SESSION['user'])!=0 && !$reverse)
		header("Location: index.php");
	if((!isset($_SESSION['user']) || strlen($_SESSION['user'])==0) && $reverse)
		header("Location: index.php");
}
