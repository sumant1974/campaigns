<?php
include_once "../layout/header.php";
include_once "../../lib/student.php";
$student=new Student;
//print_r($_POST);
$student->sid=$_POST['editsid'];
$student->firstname=$_POST['editfirstname'];
$student->lastname=$_POST['editlastname'];
$student->institute=$_POST['editinstitute'];
$student->email=$_POST['editemail'];
$student->state=$_POST['editstate'];
$student->eventid=$_POST['editeventid'];
$student->regdid=$_POST['editregdid'];
$student->coursename=$_POST['editcoursename'];
$student->duration=$_POST['editduration'];
$result=json_decode($student->update());
$_SESSION['status']=$result->status;
$_SESSION['msg']=$result->message;
//print_r($result);
//echo $_SESSION['status'];
//echo $_SESSION['msg'];
header('Location: /pages/students/');
?>