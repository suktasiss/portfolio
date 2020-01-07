<?php

// Скрипт отвечает за выход пользователя из системы

	session_start();
	$_SESSION= [];
	unset($_COOKIE[session_name()]);
	session_destroy();
	header('location:../index.php');
