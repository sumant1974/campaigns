<?php
include_once "../layout/functions.php";
include_once "../../lib/template.php";
$template=new template;
    $tid=$_GET["tid"];
    $template->tid=$tid;
    $result=json_decode($template->gettemplate());
    //print_r($result);
    print_r(json_encode($result));
?>