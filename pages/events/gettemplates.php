<?php
include_once "../layout/functions.php";
include_once "../../lib/template.php";
$template=new template;
    
    $result=json_decode($template->gettemplates());
    //print_r($result);
    print_r(json_encode($result->templates));
?>