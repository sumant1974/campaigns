<?php
include_once "../layout/functions.php";
include_once "../../lib/certificate.php";
$certificate=new certificate;
    if(isset($_GET['eventid']))
    {
        $eventid=$_GET['eventid'];
        $result=json_decode($certificate->getcertificates($eventid));
    }
    else
    {
        $result=json_decode($certificate->getcertificates());
    }
    //print_r($result);
    print_r(json_encode($result->certificates));
?>