<?php

/* class Seance includes 2 fields - $timestamp - contains data of seances
   timeArr - contains array of strings which contain  */


class Seances{

    const REGEXPTIME = "/..:../";
    const REGEXPDAY = "/([0-9]{2}) /";
    const REGEXPMONTH = "/-([0-9]{2})-/";
    const REGEXPDATE = "/.*-.*-[0-9]{1,2}/";

    const MONTHS = ['января','февраля','марта','апреля','мая','июня','июля','августа','сентября','октября','ноября','декабря'];    

    public $timestamp;
    public $timeArr = array(); 

    function __construct($timestamp) {
      $this->timestamp = $timestamp;
    }

    public function getDay($timestamp){
      preg_match(self::REGEXPDAY, $timestamp,$matches);
      return $matches[0];
    }

    public function getMonth($timestamp){
      preg_match(self::REGEXPMONTH,$timestamp,$matches);
      return $matches[1];
    }

    public function addTime($time){
      array_push($this->timeArr,$time);
    }

    public static function getTime($timestamp){
      preg_match(self::REGEXPTIME, $timestamp,$matches);
      return $matches[0];
    }

    public static function getDate($timestamp){
      preg_match(self::REGEXPDATE, $timestamp, $matches);
      return $matches[0];
    }

    public function sameDate($timestamp){
      preg_match(self::REGEXPDATE, $this->timestamp,$self);
      preg_match(self::REGEXPDATE, $timestamp,$outer);
      if($self[0] == $outer[0])
        return true;
      else
        return false;
    }

    public static function monthByNumber($number){
        return self::MONTHS[ltrim($number,"0")];
    }

    /* Constructs seance array  */

    function constructData($theater_id, $con, $movie_id){
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
          $dateObj->addTime(new Seance(Seances::getTime($row['showtime']), $row['id']));
      }
      if(!is_null($dateObj));
        array_push($datesArr,$dateObj);
      return $datesArr;
    }
  }

  ?>