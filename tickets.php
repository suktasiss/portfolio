<?php 
require_once 'includes/date.php';
require_once 'includes/twig.php';


$user_id = intval($_SESSION['id']);
$bookings = mysqli_query($con, "select s.movie_id, s.showtime, b.quantity, m.title, m.poster from movies m, bookings b join seances s on s.id=b.seance_id where b.user_id=$user_id and s.movie_id=m.id;");


$arr = array();
while($item = mysqli_fetch_array($bookings)){
    $item['showtime'] = ltrim(Date::getDay($item['showtime']),'0') . " " . Date::monthByNumber(ltrim(Date::getMonth($item['showtime'])),'0') . " в " . Date::getTime($item['showtime']);
    array_push($arr,$item);
}


$template = $twig->load('tickets.html');
echo $template->render(['user' => $user, 'title' => 'Покупки', 'items' => $arr]);
