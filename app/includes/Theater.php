<?php

// Класс предоставляет абстракцию для хранения массива сеансов по дням для определённого кинотеатра
// кроме массива сеансов в классе присутствуют атрибуты кинотеатра


class Theater
{
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

    public function addSeance($seance)
    {
        array_push($this->seances,$seance);
    }
}
