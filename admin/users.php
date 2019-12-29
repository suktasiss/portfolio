<?php
require_once 'includes/twig.php';

$items=mysqli_query($con,"select * from users");
$arr = array();
while($item = mysqli_fetch_array($items)){
    array_push($arr,$item);
}

$template = $twig->load('users.html');
echo $template->render(['admin' => $admin, 'title' => 'Пользователи','items' => $arr]);
