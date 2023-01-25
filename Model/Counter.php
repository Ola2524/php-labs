<?php

defined("_ALLOW_ACCESS") or die("No Direct access allowed");

class Counter
{
    private $counter;

    public function __contruct()
    {
        $this->counter = 0;
    }

    public static function new_visitor(){
        if(!isset($_SESSION["is_visited"])){
            $_SESSION['visited'] = true;
            return $this->counter++;
        }
    }

    public static function save_to_file(){
        if (file_exists(_Counter_FILE_)){
            $file = fopen(_Counter_FILE_, "w");
            fwrite($file, $this->counter);
            fclose($file);
        }
    }

}
