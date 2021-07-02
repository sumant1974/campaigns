<?php
session_start();
include_once "../../../lib/student.php";
$stud=new Student;
    $email=$_POST['email'];
    $eventid=$_POST['eventid'];
    $result=json_decode($stud->generatecert($email,$eventid));
    //print_r($result);
    print_r(json_encode($result));
?>