<?php
include_once "../layout/header.php";
include_once "../../lib/event.php";
$event=new Event;
$event->eventid=$_POST['event_id'];
$result=json_decode($event->delete());
$_SESSION['status']=$result->status;
$_SESSION['msg']=$result->message;
//print_r($result);
//echo $_SESSION['status'];
//echo $_SESSION['msg'];
header('Location: /pages/events/');
?>