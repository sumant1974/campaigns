<?php
session_start();
include_once "../../lib/certificate.php";
$certificate=new certificate;
    if(isset($_GET['certid']))
    {
        $certid=$_GET['certid'];
        $result=json_decode($certificate->getcertificate($certid));
    }
    //print_r($result);
    print_r(json_encode($result));
?>