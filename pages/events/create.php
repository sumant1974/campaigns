<?php
include_once "../layout/header.php";
include_once "../../lib/event.php";
$event=new Event;
$event->eventname=$_POST['event_name'];
$event->eventwebsite=$_POST['event_website'];
$result=json_decode($event->create());
$_SESSION['status']=$result->status;
$_SESSION['msg']=$result->message;
//print_r($result);
//echo $_SESSION['status'];
//echo $_SESSION['msg'];
header('Location: /pages/events/');
?>