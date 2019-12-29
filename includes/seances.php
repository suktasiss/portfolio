<?php

/* В классе Сеанс 2 поля, $timestamp - хранит дату сеансов
timeArr - хранит массив строк содержащих время сеанса на данную дату*/

require_once 'date.php';

class Seances
{

    public $timestamp;
    public $timeArr = array();
    public $date;

    function __construct($timestamp)
    {
      $this->timestamp = $timestamp;
      $this->dateCreate();
    }

    

    public function addTime($time)
    {
      array_push($this->timeArr,$time);
    }

    public function sameDate($timestamp)
    {
      preg_match(Date::REGEXPDATE, $this->timestamp,$self);
      preg_match(Date::REGEXPDATE, $timestamp,$outer);
      if($self[0] == $outer[0])
        return true;
      else
        return false;
    }

    

    /* Осуществляет запрос к БД и получает сеансы по нужному фильму в выбранном кинотеатре, возвращает массив сеансов  */

    function constructData($theater_id, $con, $movie_id)
    {
      $seancesraw=mysqli_query($con,"select * from seances where movie_id=$movie_id and hall_id in(select id from halls where theater_id=$theater_id) order by showtime");
      $datesArr = array();
      $dateObj = null;
      while($row=mysqli_fetch_array($seancesraw)){          
          if(is_null($dateObj)){
            $dateObj = new Seances($row['showtime']);
          }
          else if(!$dateObj->sameDate($row['showtime'])){
            array_push($datesArr,$dateObj);
            $dateObj = new Seances($row['showtime']);
          }
          
          $dateObj->addTime(new Seance(Date::getTime($row['showtime']), $row['id']));
      }

      if(!is_null($dateObj));
        array_push($datesArr,$dateObj);
      return $datesArr;
    }


    
    public function dateCreate()
    {
        $this->date = ltrim(Date::getDay($this->timestamp) . " " . Date::monthByNumber(Date::getMonth($this->timestamp)),'0');
    }


 }
