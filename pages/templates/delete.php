<?php
include_once "../layout/header.php";
include_once "../../lib/template.php";
$template=new template;
$template->tid=$_POST['template_id'];
$result=json_decode($template->delete());
$_SESSION['status']=$result->status;
$_SESSION['msg']=$result->message;
//print_r($result);
//echo $_SESSION['status'];
//echo $_SESSION['msg'];
header('Location: /pages/templates/');
?>