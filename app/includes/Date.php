<?php 

// Класс предоставляет методы и константы для работы с датами и 
// строками в формате timestamp

class Date
{
    const REGEXPTIME = "/..:../";
    const REGEXPDAY = "/([0-9]{2}) /";
    const REGEXPMONTH = "/-([0-9]{2})-/";
    const REGEXPDATE = "/.*-.*-[0-9]{1,2}/";

    const MONTHS = ['января','февраля','марта','апреля','мая','июня','июля','августа','сентября','октября','ноября','декабря']; 

    public static function getDay($timestamp){
        preg_match(self::REGEXPDAY, $timestamp,$matches);
        return $matches[0];
    }

    public static function getMonth($timestamp){
        preg_match(self::REGEXPMONTH,$timestamp,$matches);
        return $matches[1];
    }

    public static function monthByNumber($number){
        return self::MONTHS[ltrim($number,"0")];
    }

    public static function getTime($timestamp){
        preg_match(self::REGEXPTIME, $timestamp,$matches);
        return ltrim($matches[0],'0');
    }

    public static function getDate($timestamp){
        preg_match(self::REGEXPDATE, $timestamp, $matches);
        return ltrim($matches[0],'0');
    }
}
