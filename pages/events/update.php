<?php
include_once "../layout/header.php";
include_once "../../lib/event.php";
$event=new Event;
//print_r($_POST);
$event->eventid=$_POST['event_id'];
$event->eventname=$_POST['event_name'];
$event->eventwebsite=$_POST['event_website'];
$result=json_decode($event->update());
$_SESSION['status']=$result->status;
$_SESSION['msg']=$result->message;
//print_r($result);
//echo $_SESSION['status'];
//echo $_SESSION['msg'];
header('Location: /pages/events/');
?>