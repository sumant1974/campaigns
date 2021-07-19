<?php
include_once "../layout/functions.php";
include_once "../../lib/auth.php";
$auth=new Auth();
$auth->getSummary();
$summary=$auth->summary;
print_r(json_encode($summary));
?>