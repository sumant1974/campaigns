<?php
include_once "../layout/functions.php";
include_once "../../lib/event.php";
$event=new Event;
    
    $result=json_decode($event->getevents());
    //print_r($result);
    print_r(json_encode($result->events));
?>