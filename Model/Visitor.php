<?php

defined("_ALLOW_ACCESS") or die("No Direct access allowed");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Person
 *
 * @author webre
 */
class Visitor
{
    //put your code here
    
    private $is_visited;

    public function __construct(){

    }

    public function visited(){
        session_start();
        $_SESSION["is_visited"] = false;
    }

}
