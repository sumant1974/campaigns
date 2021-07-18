<?php
include_once 'libs/students.php';
include_once 'config/database.php';
class Student
{
    public $sid;
    public $studentname;
    public $firstname;
    public $lastname;
    public $email;
    public $institute;
    public $state;
    public $regdid;
    public $coursename;
    public $duration;
    public $eventid;
    public $eventname;
    public $allStudents;
    private $Students;
    private $studevents;
    public function __construct(){
       // get database connection
       $database = new Database();
       $db = $database->getConnection();
        $this->Students=new Students($db);
    }
    
    public function create()
    {
        if(!empty($this->lastname) && !empty($this->firstname) && !empty($this->email) && !empty($this->institute) && !empty($this->state) && !empty($this->eventid))
        {
            $this->Students->email=$this->email;
            $this->Students->firstname=$this->firstname;
            $this->Students->lastname=$this->lastname;
            $this->Students->institute=$this->institute;
            $this->Students->state=$this->state;
            $this->Students->eventid=$this->eventid;
            $this->Students->regdid=$this->regdid;
            $this->Students->coursename=$this->coursename;
            $this->Students->duration=$this->duration;
            $result=$this->Students->create();
            //print_r($result);
            if(!$result){
                $result=json_encode(
                    array(
                        "status"=>"0",
                        "message" => $this->Students->errmsg
                    )
                );
            }
            else
            {
                $result=json_encode(
                    array(
                       "status"=>"1",
                      "message" => "Student Added Successfully."
                    )
            );
            }
            return $result;
        }
        else
        {
            $result=json_encode(
                array(
                    "status"=>"0",
                    "message" => "Error:Required data not supplied to create Student."
                )
            );
            return $result;
        }
    }
    public function update()
    {
        if(!empty($this->sid) && !empty($this->lastname) && !empty($this->firstname) && !empty($this->email) && !empty($this->institute) && !empty($this->state) && !empty($this->eventid))
        {
            $this->Students->sid=$this->sid;
            $this->Students->email=$this->email;
            $this->Students->firstname=$this->firstname;
            $this->Students->lastname=$this->lastname;
            $this->Students->institute=$this->institute;
            $this->Students->state=$this->state;
            $this->Students->eventid=$this->eventid;
            $result=$this->Students->update();
            //print_r($result);
            if(!$result){
                $result=json_encode(
                    array(
                        "status"=>"0",
                        "message" => $this->Students->errmsg
                    )
                );
            }
            else
            {
                $result=json_encode(
                    array(
                        "status"=>"1",
                        "message" => "Student Updated Successfully."
                    )
                );
            }
            
            return $result;
        }
        else
        {
            $result=json_encode(
                array(
                    "status"=>"0",
                    "message" => "Error:Required data not supplied to update Student."
                )
            );
            return $result;
        }
        
    }
    public function delete()
    {
        if(!empty($this->sid))
        {
            $this->Students->sid=$this->sid;
            $result=$this->Students->delete();
            //print_r($result);
            if(!$result){die($this->Students->errmsg);}
            $result=json_encode(
                array(
                    "status"=>"1",
                    "message" => "Student Deleted Successfully."
                )
            );
            return $result;
        }
        else
        {
            $result=json_encode(
                array(
                    "status"=>"0",
                    "message" => "Error:Required data not supplied to delete Student."
                )
            );;
            return $result;
        }
        
    }
public function getStudentCount()
{
    $this->Students->getStudentcount();
        $ecount=$this->Students->studentcount;
        $result=json_encode(
            array(
                 "Studentscount"=>"$ecount"
            )
        );
        return $result;
}
   public function getStudents($eventid="")
   {
        $this->Students->getallStudents($eventid);
        $this->allStudents=$this->Students->allstudents;
        $this->Students->getStudentcount();
        $ecount=$this->Students->studentcount;
        //print_r($result);
        //if(!$allStudents){die($this->Students->errmsg);}
        $result=json_encode(
            array(
                 "Studentscount"=>"$ecount",
                "Students" => $this->allStudents
            )
        );
        return $result;
   }
   public function getStudent()
   {
    if(!empty($this->sid))
    {
        $this->Students->sid=$this->sid;
        $result=$this->Students->getStudent();
        //print_r($result);
        if(!$result){die("Connection Failure");}
        $result=json_encode(
            array(
                "studentname"=>$this->Students->studentname,
                "firstname" => $this->Students->firstname,
                "lastname" => $this->Students->lastname,
                "email" => $this->Students->email,
                "institute" => $this->Students->institute,
                "state" => $this->Students->state,
                "eventid" => $this->Students->eventid,
                "eventname" => $this->Students->eventname
            )
        );
        return $result;
    }
    else
    {
        $result=json_encode(
            array(
                "status"=>"0",
                "message" => "Error:Required data not supplied to delete Student."
            )
        );;
        return $result;
    }
   }
   public function getStudentEvent($email="")
   {
    $this->Students->getallStudentEvents($email);
    $this->studevents=$this->Students->studevents;
    //print_r($result);
    //if(!$allStudents){die($this->Students->errmsg);}
    $result=json_encode($this->studevents);
    return $result;
   }

   public function generatecert($email,$eventid)
   {
       $result=$this->Students->generatecert($email, $eventid);
        if(!$result){die($this->Students->errmsg);}
        $result=$this->Students->certdetails;
        return $result;
   }
     
}
?>