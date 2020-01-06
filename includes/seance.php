<?php

// Класс является полезной абстракции для хранения даты и работы с ней
// time - время в формате timestamp


require_once 'date.php';

class Seance
{
	public $id;
	public $time;

	function __construct($time, $id) {
      $this->time = $time;
      $this->id = $id;
    }


    
    function getTime(){
        return Date::getTime($this->time);
    }

}
