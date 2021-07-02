<?php
// 'Certificates' object
class Certificates{
 
    // database connection and table name
    private $conn;
    private $table_name = "certificate";

    //variables
    public $certid;
     public $certcount;
     public $allCertificates;
     public $errmsg;
    // constructor
    public function __construct($db){
        $this->conn = $db;
		//$allusers=array();
    }
//Get All Certificates
function getallCertificates($eventid=""){
    if($eventid=="")
    {
        $query = "SELECT `eventid`,`eventname`,`certid`,`certissuedate`,`certdetails`,`studentname`,`email`,`institute`,`state`,`regdid`,`coursename`,`duration` FROM `certdetails`"; 
        // prepare the query
        $stmt = $this->conn->prepare( $query );        
    }
    else
    {
        $query = "SELECT `eventid`,`eventname`,`certid`,`certissuedate`,`certdetails`,`studentname`,`email`,`institute`,`state`,`regdid`,`coursename`,`duration` FROM `certdetails` where eventid=:eventid"; 
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
		$this->allCertificates=$stmt->fetchAll(PDO::FETCH_ASSOC);
		//echo json_encode($allusers);
        return true;
    }
 
    // return false if email does not exist in the database
    $errmsg=implode(",",$stmt->errorInfo());
    return false;
}

function getCertificatecount(){

     // query to check if email exists
     $query = "SELECT count(*) as certcount FROM " . $this->table_name;
 
     // prepare the query
     $stmt = $this->conn->prepare( $query );
 
     $stmt->execute();
  
     // get number of rows
     $num = $stmt->rowCount();
  
     if($num>0){
  
         // get record details / values
         $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->certcount=$row['certcount'];
         //echo json_encode($allusers);
         return true;
     }
  
     // return false if email does not exist in the database
     $this->errmsg=implode(",",$stmt->errorInfo());
     return false;
}


}