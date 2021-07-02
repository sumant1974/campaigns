<?php
session_start();
include_once "../../../lib/student.php";
$stud=new Student;
    $email=$_GET['email'];
    $result=json_decode($stud->getStudentEvent($email));
    //print_r($result);
    print_r(json_encode($result));
?>