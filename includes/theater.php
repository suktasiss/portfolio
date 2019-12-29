<?php


class Theater{
    public $seances = array();
    public $name;
    public $id;
    public $address;

    
    public function __construct($id, $name, $address)
    {
        $this->name = $name;
        $this->id = $id;
        $this->address = $address;
    }

    public function addSeance($seance){
        array_push($this->seances,$seance);
    }
}
?>
