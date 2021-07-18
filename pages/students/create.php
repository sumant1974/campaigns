<?php
include_once "../layout/header.php";
include_once "../../lib/student.php";
$student=new Student;
//print_r($_POST);
$student->firstname=$_POST['firstname'];
$student->lastname=$_POST['lastname'];
$student->institute=$_POST['institute'];
$student->email=$_POST['email'];
$student->state=$_POST['state'];
$student->eventid=$_POST['eventid'];
$student->regdid=$_POST['regdid'];
$student->duration=$_POST['duration'];
$student->coursename=$_POST['coursename'];
$result=json_decode($student->create());
$_SESSION['status']=$result->status;
$_SESSION['msg']=$result->message;
//print_r($result);
//echo $_SESSION['status'];
//echo $_SESSION['msg'];
header('Location: /pages/students/');
?>