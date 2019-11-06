<?php
class Seance{
	private $id;
	private $time;

	function __construct($time, $id) {
      $this->time = $time;
      $this->id = $id;
    }

    function __get($index){
    	return $this->$index;
    }

    function __set($index,$value){
    	if(isset($this->$index))
    		$this->$index = $value;
    	else{
    		error_log("h");
    		throw new Exception("Атрибут $index не существует");
    	}
    }
}
?>