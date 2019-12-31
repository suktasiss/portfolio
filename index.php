<?php
require_once 'includes/twig.php';

$template = $twig->load('index.html');
$movies=mysqli_query($con,"select * from movies");
$arr = array();
while($item = mysqli_fetch_array($movies)){
    array_push($arr,$item);
}
echo $template->render(['movies' => $movies, 'user' => $user, 'title' => 'Кино']);
