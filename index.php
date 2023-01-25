<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once("autoload.php");

$visitor = new Visitor();
$counter = new Counter();

$visitor->visited();
echo "Counted unique visitors: ";
echo $counter->new_visitor();
$counter->save_to_file();