<?php
include_once "../layout/header.php";
include_once "../../lib/student.php";
$student=new Student;
echo($_POST['deletesid']);
$student->sid=$_POST['deletesid'];
$result=json_decode($student->delete());
$_SESSION['status']=$result->status;
$_SESSION['msg']=$result->message;
//print_r($result);
//echo $_SESSION['status'];
//echo $_SESSION['msg'];
header('Location: /pages/students/');
?>