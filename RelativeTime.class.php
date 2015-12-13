<?php
//Relative Time Calculator for PHP
//Copyright (c) Ben Dahrooge <ben@dahrooge.com> 2015
//MIT License

namespace bendahrooge;
class RelativeTime {

    private $debug = false; //@note: change this value to set default debug mode :)
    public $time_predefined;

    function __construct($debug = false) {
        
        if(isset($debug) && $debug !== false)
        {
            $this->debug = true;
        }
        
        $this->time_predefined = time();
    }

    private function handleError($text)
    {
        if($this->debug === true)
        {
            trigger_error("bendahrooge\RelativeTime: " . $text, E_USER_NOTICE);
        }
    }
    
    public function between($time)
    {
        //@input: two item array
        if(count($time) >= 2)
        {
            $this->handleError("Array has too many values");
        }
        
        arsort($time);
        return $this->RelativeTime($time[1], $time[0]);
    }
    
    public function since($time)
    {
        return $this->RelativeTime(time(), $time);
    }
    
    public function until($time)
    {
        return $this->RelativeTime($time, time());
    }
    
    private function RelativeTime($now, $time)
    {
        $a = intval(round((intval($now) - $time) / 60 ));
            switch(true)
            {
                case ($a <= 2): 
                    $toReturn = 'Just Now';
                    break;
                case ($a >= 2 && $a <= 60): 
                    $toReturn = $a ; $unit = ' min';
                    break;
                case ($a >= 60 && $a <= (60 * 24)): 
                    $toReturn = round($a / 60) ; $unit = ' hour';
                    break;
                case ($a >= (60 * 24) && $a <= (60 * 24 * 30)): 
                    $toReturn = round($a / (60 * 24)) ; $unit = ' day';
                    break;
                case ($a >= (60 * 24 * 30) && $a <= (60 * 24 * 30 * 12)): 
                    $toReturn = round($a / (60 * 24 * 30)) ; $unit = ' month';
                    break;
                case ($a >= (60 * 24 * 30 * 12) && $a <= (60 * 24 * 30 * 12 * 10)): 
                    $toReturn = round($a / (60 * 24 * 30 * 12)) ; $unit = ' year';
                    break;
                case ($a >= (60 * 24 * 30 * 12 * 10) && $a <= (60 * 24 * 30 * 12 * 99)): 
                    $toReturn = round($a / (60 * 24 * 30 * 12 * 10)) ; $unit = ' decade';
                    break;
                case ($a >= (60 * 24 * 30 * 12 * 10 * 99) && $a <= (60 * 24 * 30 * 12 * 999)): 
                    $toReturn = round($a / (60 * 24 * 30 * 12 * 10 * 99)) ; $unit = ' centurie';
                    break;
                case ($a >= (60 * 24 * 30 * 12 * 10 * 999)): 
                    $toReturn = round($a / (60 * 24 * 30 * 12 * 10 * 999)) ; $unit = ' millenium';
                    break; 
                default:
                    $this->handleError("Invalid argument supplied for bendahrooge/relativetime->since();");
            }
        
            if($toReturn >= 2)
            {
                $unit .= 's';
            }
    
            return $toReturn . $unit;
    }

}
?>
