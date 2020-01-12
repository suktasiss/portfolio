<?php 

require_once 'includes/Date.php';
require_once 'includes/Twig.php';


class TicketsController extends Base
{
    public $twig;
    public $pdo;
    public $bookings;

    public function __construct()
    {

        login_check(true);
        $this->twig =  new Twig();

        $PDOWrap = new PDOWrap();
        $this->pdo = $PDOWrap->getPDO();

        $user_id = intval($_SESSION['id']);

        $bookingsraw = $this->pdo->query("select s.movie_id, s.showtime, b.quantity, m.title, m.poster from movies m, bookings b join seances s on s.id=b.seance_id where b.user_id=$user_id and s.movie_id=m.id;");

        $this->bookings = array();
        while($item = $bookingsraw->fetch()){
            $item['showtime'] = ltrim(Date::getDay($item['showtime']),'0') . " " . Date::monthByNumber(ltrim(Date::getMonth($item['showtime'])),'0') . " в " . Date::getTime($item['showtime']);
            array_push($this->bookings,$item);
        }

    }

    public function draw()
    {
        $template = $this->twig->load('tickets.html');
        echo $template->render(['user' => $this->getUser(), 'title' => 'Покупки', 'items' => $this->bookings]);
    }
}
