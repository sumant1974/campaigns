<?php
include_once "../layout/functions.php";
include_once "../../lib/student.php";
$student=new Student;
    if(isset($_GET['eventid']))
    {
        $eventid=$_GET['eventid'];
        $result=json_decode($student->getStudents($eventid));
    }
    else
    {
        $result=json_decode($student->getStudents());
    }
    //print_r($result);
    print_r(json_encode($result->Students));
?>