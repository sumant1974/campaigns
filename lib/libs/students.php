<?php
// 'Students' object
class Students{
 
    // database connection and table name
    private $conn;
    private $table_name = "Student";

    //variables
    public $sid;
    public $email;
    public $firstname;
    public $lastname;
    public $studentname;
    public $state;
    public $regdid;
    public $coursename;
    public $eventid;
    public $eventname;
    public $institute;
    public $duration;
     public $studentcount;
     public $allstudents;
     public $errmsg;
    public $studevents;
    public $certdetais;
    // constructor
    public function __construct($db){
        $this->conn = $db;
		//$allusers=array();
    }

    function create(){
 
        // insert query
        $query = "INSERT INTO " . $this->table_name . "
                SET
                    email = :email,
                    firstname = :firstname,
                    lastname = :lastname,
                    eventid = :eventid,
                    institute = :institute,
                    state = :state,
                    regdid = :regdid,
                    coursename = :coursename,
                    duration = :duration"
                    ;
     
        // prepare the query
        $stmt = $this->conn->prepare($query);
     
        // sanitize
        $this->email=htmlspecialchars(strip_tags($this->email));
     //   $this->firstname=htmlspecialchars(strip_tags($this->firstname));
     //   $this->lastname=htmlspecialchars(strip_tags($this->lastname));
        $this->eventid=htmlspecialchars(strip_tags($this->eventid));
      //  $this->institute=htmlspecialchars(strip_tags($this->institute));
        $this->state=htmlspecialchars(strip_tags($this->state));
        $this->regdid=htmlspecialchars(strip_tags($this->regdid));
     //   $this->coursename=htmlspecialchars(strip_tags($this->coursename));
        $this->duration=htmlspecialchars(strip_tags($this->duration));
         
        // bind the values
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':firstname', $this->firstname);
        $stmt->bindParam(':lastname', $this->lastname);
        $stmt->bindParam(':eventid', $this->eventid);
        $stmt->bindParam(':institute', $this->institute);
        $stmt->bindParam(':state', $this->state);
        $stmt->bindParam(':regdid', $this->regdid);
        $stmt->bindParam(':coursename', $this->coursename);
        $stmt->bindParam(':duration', $this->duration);

    // echo "all set";
        // execute the query, also check if query was successful
        if($stmt->execute()){
        //	echo "insert OK";
            return true;
        }
        //echo implode(",",$stmt->errorInfo());
        $this->errmsg=implode(",",$stmt->errorInfo());
        return false;
    }

    // update() method will be here
public function update(){
 
    $query = "UPDATE " . $this->table_name . "
            SET
                email=:email,
                firstname = :firstname,
                lastname = :lastname,
                eventid = :eventid,
                institute = :institute,
                state = :state,
                regdid = :regdid,
                coursename = :coursename,
                duration = :duration
            WHERE
                sid=:sid";
 
    // prepare the query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->email=htmlspecialchars(strip_tags($this->email));
        $this->firstname=htmlspecialchars(strip_tags($this->firstname));
        $this->lastname=htmlspecialchars(strip_tags($this->lastname));
        $this->eventid=htmlspecialchars(strip_tags($this->eventid));
        $this->institute=htmlspecialchars(strip_tags($this->institute));
        $this->state=htmlspecialchars(strip_tags($this->state));
        $this->regdid=htmlspecialchars(strip_tags($this->regdid));
        $this->coursename=htmlspecialchars(strip_tags($this->coursename));
        $this->duration=htmlspecialchars(strip_tags($this->duration));
    // bind the values from the form
    $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':firstname', $this->firstname);
        $stmt->bindParam(':lastname', $this->lastname);
        $stmt->bindParam(':eventid', $this->eventid);
        $stmt->bindParam(':institute', $this->institute);
        $stmt->bindParam(':state', $this->state);
        $stmt->bindParam(':regdid', $this->regdid);
        $stmt->bindParam(':coursename', $this->coursename);
        $stmt->bindParam(':duration', $this->duration);
    // unique ID of record to be edited
    $this->sid=htmlspecialchars(strip_tags($this->sid));
    $stmt->bindParam(':sid', $this->sid);
 
    // execute the query
    if($stmt->execute()){
        return true;
    }
 
    $this->errmsg=implode(",",$stmt->errorInfo());
    return false;
}

function delete(){
 
    // query to check if email exists
    $query = "DELETE FROM " . $this->table_name . " WHERE `sid`=:sid";
 
    // prepare the query
    $stmt = $this->conn->prepare( $query );
    // unique ID of record to be edited
    $this->sid=htmlspecialchars(strip_tags($this->sid));
    $stmt->bindParam(':sid', $this->sid);

   if($stmt->execute()){
        return true;
    }
 
    // return false if email does not exist in the database
    $this->errmsg=implode(",",$stmt->errorInfo());
    return false;
}



//Get All Students
function getallStudents($eventid=""){
    if($eventid=="")
    {
        $query = "SELECT `sid`,`firstname`,`lastname`, `studentname`, `email`, `institute`, `state`, `eventid`, `eventname`,`regdid`,`coursename`,`duration` FROM  Students"; 
        // prepare the query
        $stmt = $this->conn->prepare( $query );        
    }
    else
    {
        $query = "SELECT `sid`,`firstname`,`lastname`, `studentname`, `email`, `institute`, `state`, `eventid`, `eventname`,`regdid`,`coursename`,`duration` FROM  Students where eventid=:eventid"; 
        // prepare the query
        $stmt = $this->conn->prepare( $query );
        $eventid=htmlspecialchars(strip_tags($eventid));
        $stmt->bindParam(':eventid', $eventid);    
    }
    // query to check if email exists
    
    $stmt->execute();
 
    // get number of rows
    $num = $stmt->rowCount();
 
    if($num>0){
 
        // get record details / values
		$this->allstudents=$stmt->fetchAll(PDO::FETCH_ASSOC);
		//echo json_encode($allusers);
        return true;
    }
 
    // return false if email does not exist in the database
    $errmsg=implode(",",$stmt->errorInfo());
    return false;
}

//Get a Single Student
function getStudent(){
 
    // query to check if email exists
    $query = "SELECT `firstname`,`lastname`,`studentname`, `email`, `institute`, `state`, `eventid`, `eventname`,`regdid`,`coursename`,`duration` FROM  Students WHERE `sid`=:sid";
 
    // prepare the query
    $stmt = $this->conn->prepare( $query );
    // unique ID of record to be edited
    $this->sid=htmlspecialchars(strip_tags($this->sid));
    $stmt->bindParam(':sid', $this->sid);

    $stmt->execute();
 
    // get number of rows
    $num = $stmt->rowCount();
 
    if($num>0){
 
        // get record details / values
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->firstname=$row['firstname'];
        $this->lastname=$row['lastname'];
        $this->studentname=$row['studentname'];
        $this->eventid=$row['eventid'];
        $this->eventname=$row['eventname'];
        $this->email=$row['email'];
        $this->institute=$row['institute'];
        $this->state=$row['state'];
        $this->regdid=$row['regdid'];
        $this->coursename=$row['coursename'];
        $this->duration=$row['duration'];
        return true;
    }
 
    // return false if email does not exist in the database
    $this->errmsg=implode(",",$stmt->errorInfo());
    return false;
}
function getStudentcount(){

     // query to check if email exists
     $query = "SELECT count(*) as studentcount FROM " . $this->table_name;
 
     // prepare the query
     $stmt = $this->conn->prepare( $query );
 
     $stmt->execute();
  
     // get number of rows
     $num = $stmt->rowCount();
  
     if($num>0){
  
         // get record details / values
         $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->studentcount=$row['studentcount'];
         //echo json_encode($allusers);
         return true;
     }
  
     // return false if email does not exist in the database
     $this->errmsg=implode(",",$stmt->errorInfo());
     return false;
}

function getallStudentEvents($email=""){
    if($email=="")
    {
        $query = "SELECT  `eventid`, `eventname` FROM  Students"; 
        // prepare the query
        $stmt = $this->conn->prepare( $query );        
    }
    else
    {
        $query = "SELECT `eventid`, `eventname` FROM  Students where email=:email"; 
        // prepare the query
        $stmt = $this->conn->prepare( $query );
        $email=htmlspecialchars(strip_tags($email));
        $stmt->bindParam(':email', $email);    
    }
    // query to check if email exists
    
    $stmt->execute();
 
    // get number of rows
    $num = $stmt->rowCount();
 
    if($num>0){
 
        // get record details / values
		$this->studevents=$stmt->fetchAll(PDO::FETCH_ASSOC);
		//echo json_encode($allusers);
        return true;
    }
 
    // return false if email does not exist in the database
    $errmsg=implode(",",$stmt->errorInfo());
    return false;
}

function generateCert($email, $eventid){
    if($email<>"" && $eventid<>"")
    {
        $query = "SELECT  `certdetails` FROM  `certdetails` where email=:email and eventid=:eventid"; 
        // prepare the query
        $stmt = $this->conn->prepare( $query );  
        $email=htmlspecialchars(strip_tags($email));
        $eventid=htmlspecialchars(strip_tags($eventid));
        $stmt->bindParam(':email', $email); 
        $stmt->bindParam(':eventid', $eventid);    
        $stmt->execute();
 
        // get number of rows
        $num = $stmt->rowCount();
 
        if($num>0){
 
            // get record details / values
            //$row = $stmt->fetch(PDO::FETCH_ASSOC);
		    $this->certdetails=$this->regenCert($email,$eventid);
		    //echo json_encode($allusers);
            if($this->certdetails)
            {
                return true;
            }
        }   
        else
        {
            $this->certdetails=$this->createCert($email,$eventid);
            if($this->certdetails)
            {
                return true;
            }
            
        }
    }
    $errmsg=implode(",",$stmt->errorInfo());
    return false;
}

function createCert($email, $eventid){
    $query = "SELECT  `sid`,`studentname`,`email`,`eventname`,`coursename`,`duration`,`regdid`,`institute`,`state` FROM  `Students` where email=:email and eventid=:eventid"; 
        // prepare the query
        $stmt = $this->conn->prepare( $query );  
        $email=htmlspecialchars(strip_tags($email));
        $eventid=htmlspecialchars(strip_tags($eventid));
        $stmt->bindParam(':email', $email); 
        $stmt->bindParam(':eventid', $eventid);    
        $stmt->execute();
        $srow = $stmt->fetch(PDO::FETCH_ASSOC);
		$sid=$srow['sid'];
        $certid=md5($sid.date("Y.d.m").$email.$eventid);
        date_default_timezone_set("Asia/Kolkata");
        $certissuedate=date("d M Y");
        $sql = "SELECT `tid`,`tdetails` FROM `certtemplate` WHERE `eventid`=:eventid"; 
        // prepare the query
        $stmt2 = $this->conn->prepare($sql);
       // echo($eventid);
        $stmt2->bindParam(':eventid', $eventid); 
        $stmt2->execute();
        //echo($stmt2->rowCount());
        $trow = $stmt2->fetch(PDO::FETCH_ASSOC);
		$tid=$trow['tid'];
        //echo $sid;
        //echo $srow['studentname'];
        //echo $tid;
        //echo($trow['tdetails']);
        $tdetails=json_decode($trow['tdetails']);
        $tdetails->name=$srow['studentname'];
        $tdetails->email=$email;
        foreach($tdetails->texts as $text){
            switch($text->txtfield)
            {
                case "StudentName":
                    $text->txtfield=$srow['studentname'];
                    break;
                case "coursename":
                    $text->txtfield=$srow['coursename'];
                    break;
                case "duration":
                    $text->txtfield=$srow['duration'];
                    break;
                case "regdid":
                    $text->txtfield=$srow['regdid'];
                    break;
                case "Institute":
                    $text->txtfield=$srow['institute'];
                    break;
                case "Email":
                    $text->txtfield=$srow['email'];
                    break;
                case "StateName":
                    $text->txtfield=$srow['state'];
                    break;
                case "eventname":
                    $text->txtfield=$srow['eventname'];
                    break;
                case "certid":
                    $text->txtfield=$certid;
                    break;
                case "certissuedate":
                    $text->txtfield=$certissuedate;
                    break;
                default:
                    break;
            }
        }
        if(isset($tdetails->qrcodes)){
            foreach($tdetails->qrcodes as $qrcode)
            {
                $qrcode->txt=$qrcode->txt.$certid;
            }
        }
        
        $certdetails=json_encode($tdetails);
        //insert certificate
        $query = "INSERT INTO  `certificate`
                SET
                    sid = :sid,
                    certid = :certid,
                    eventid = :eventid,
                    tid = :tid,
                    certissuedate = :certissuedate,
                    certdetails = :certdetails"
                    ;
        $cstmt = $this->conn->prepare($query);
        $cstmt->bindParam(':sid', $sid);
        $cstmt->bindParam(':certid', $certid);
        $cstmt->bindParam(':eventid', $eventid);
        $cstmt->bindParam(':tid', $tid);
        $cstmt->bindParam(':certissuedate', $certissuedate);
        $cstmt->bindParam(':certdetails', $certdetails);
        if($cstmt->execute()){
            return $certdetails;
        }
        $errmsg=implode(",",$stmt->errorInfo());
        return false;
}

function regenCert($email, $eventid){
    $query = "SELECT  `certid`,`certissuedate`,`studentname`,`email`,`eventname`,`coursename`,`duration`,`regdid`,`institute`,`state` FROM  `certdetails` where email=:email and eventid=:eventid"; 
        // prepare the query
        $stmt = $this->conn->prepare( $query );  
        $email=htmlspecialchars(strip_tags($email));
        $eventid=htmlspecialchars(strip_tags($eventid));
        $stmt->bindParam(':email', $email); 
        $stmt->bindParam(':eventid', $eventid);    
        $stmt->execute();
        $srow = $stmt->fetch(PDO::FETCH_ASSOC);
		$certid=$srow['certid'];
        $sql = "SELECT `tid`,`tdetails` FROM `certtemplate` WHERE `eventid`=:eventid"; 
        // prepare the query
        $stmt2 = $this->conn->prepare($sql);
       // echo($eventid);
        $stmt2->bindParam(':eventid', $eventid); 
        $stmt2->execute();
        //echo($stmt2->rowCount());
        $trow = $stmt2->fetch(PDO::FETCH_ASSOC);
		$tid=$trow['tid'];
        //echo $sid;
        //echo $srow['studentname'];
        //echo $tid;
        //echo($trow['tdetails']);
        $tdetails=json_decode($trow['tdetails']);
        $tdetails->name=$srow['studentname'];
        $tdetails->email=$email;
        foreach($tdetails->texts as $text){
            switch($text->txtfield)
            {
                case "StudentName":
                    $text->txtfield=$srow['studentname'];
                    break;
                case "coursename":
                    $text->txtfield=$srow['coursename'];
                    break;
                case "duration":
                    $text->txtfield=$srow['duration'];
                    break;
                case "regdid":
                    $text->txtfield=$srow['regdid'];
                    break;
                case "Institute":
                    $text->txtfield=$srow['institute'];
                    break;
                case "Email":
                    $text->txtfield=$srow['email'];
                    break;
                case "StateName":
                    $text->txtfield=$srow['state'];
                    break;
                case "eventname":
                    $text->txtfield=$srow['eventname'];
                    break;
                case "certid":
                    $text->txtfield=$srow['certid'];
                    break;
                case "certissuedate":
                    $text->txtfield=$srow['certissuedate'];
                    break;
                default:
                    break;
            }
        }
        if(isset($tdetails->qrcodes)){
            foreach($tdetails->qrcodes as $qrcode)
            {
                $qrcode->txt=$qrcode->txt.$certid;
            }
        }
        
        $certdetails=json_encode($tdetails);
        //insert certificate
        $query = "UPDATE  `certificate`
                SET
                    certdetails = :certdetails
                    where
                    certid=:certid"
                    ;
        $cstmt = $this->conn->prepare($query);
        $cstmt->bindParam(':certid', $certid);
        $cstmt->bindParam(':certdetails', $certdetails);
        if($cstmt->execute()){
            return $certdetails;
        }
        $errmsg=implode(",",$stmt->errorInfo());
        return false;
}

}