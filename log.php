<?php
    $log = file_exists("log.txt")?file_get_contents("log.txt"):0;

    $months = array('January','February','March','April','May','June','July','August','September','October','November','December');

    for($i = 0; $i < 12; $i++){
        $log =   str_replace($months[$i], "Visited date: ".$months[$i], $log);
    }
    
    $log =   str_replace("Visited date","<hr><br>Visited date", $log);
    $log = substr($log, 8);

    $log =  str_replace("am","am<br>IP Address:$_SERVER[REMOTE_ADDR]<br>Email: ",$log);
    $log =  str_replace("pm","pm<br>IP Address:$_SERVER[REMOTE_ADDR]<br>Email: ",$log);

    $log =  str_replace("com","com<br>Name: ",$log);

    $log =  str_replace(",","", $log);

    echo $log;