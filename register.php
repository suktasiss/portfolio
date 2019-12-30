<?php

require_once 'includes/twig.php';


login_check(false);

$template = $twig->load('register.html');
echo $template->render(['user' => $user, 'title' => 'Регистрация']);
