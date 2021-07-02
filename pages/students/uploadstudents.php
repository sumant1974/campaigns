<?php
include_once "../layout/functions.php";
include_once "../../lib/student.php";
$student=new Student;
$student->firstname=$_POST['firstname'];
$student->lastname=$_POST['lastname'];
$student->institute=$_POST['institute'];
$student->email=$_POST['email'];
$student->state=$_POST['state'];
$student->eventid=$_POST['eventid'];
$record=$_POST['record'];
$result=json_decode($student->create());
$result->record=$record;
print_r(json_encode($result));
?>