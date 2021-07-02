<?php
include_once "../layout/functions.php";
include_once "../../lib/auth.php";
$auth=new Auth();
$auth->getDashboard();
$dashboard=$auth->dashboard;
print_r(json_encode($dashboard));
?>