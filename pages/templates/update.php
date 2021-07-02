<?php
include_once "../layout/header.php";
include_once "../../lib/template.php";
$template=new template;
//print_r($_POST);
$template->tid=$_POST['template_id'];
$template->tname=$_POST['template_name'];
$template->tdetails=$_POST['template_details'];
$template->eventid=$_POST['event_id'];
$result=json_decode($template->update());
$_SESSION['status']=$result->status;
$_SESSION['msg']=$result->message;
//print_r($result);
//echo $_SESSION['status'];
//echo $_SESSION['msg'];
header('Location: /pages/templates/');
?>