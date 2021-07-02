<?php
// 'templates' object
class templates{
 
    // database connection and table name
    private $conn;
    private $table_name = "certtemplate";

    //variables
    public $tid;
    public $tname;
    public $tdetails;
    public $eventid;
    public $eventname;
    public $alltemplates;
     public $templatecount;
     public $errmsg;

    // constructor
    public function __construct($db){
        $this->conn = $db;
		//$allusers=array();
    }

    function create(){
 
        // insert query
        $query = "INSERT INTO " . $this->table_name . "
                SET
                    tname = :tname,
                    tdetails = :tdetails,
                    eventid = :eventid"
                    ;
     
        // prepare the query
        $stmt = $this->conn->prepare($query);
     
        // sanitize
        
        $this->tname=htmlspecialchars(strip_tags($this->tname));
        $this->tdetails=$this->tdetails;
        $this->eventid=htmlspecialchars(strip_tags($this->eventid));
         
        // bind the values
        
        $stmt->bindParam(':tname', $this->tname);
        $stmt->bindParam(':tdetails', $this->tdetails);
        $stmt->bindParam(':eventid', $this->eventid);
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
                tname = :tname,
                tdetails = :tdetails,
                eventid = :eventid
            WHERE
                tid=:tid";
 
    // prepare the query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->tname=htmlspecialchars(strip_tags($this->tname));
    $this->tdetails=$this->tdetails;
    $this->eventid=htmlspecialchars(strip_tags($this->eventid));
    // bind the values from the form
    $stmt->bindParam(':tname', $this->tname);
    $stmt->bindParam(':tdetails', $this->tdetails);
    $stmt->bindParam(':eventid', $this->eventid);
    // unique ID of record to be edited
    $this->tid=htmlspecialchars(strip_tags($this->tid));
    $stmt->bindParam(':tid', $this->tid);
 
    // execute the query
    if($stmt->execute()){
        return true;
    }
 
    $this->errmsg=implode(",",$stmt->errorInfo());
    return false;
}

function delete(){
 
    // query to check if email exists
    $query = "DELETE FROM " . $this->table_name . " WHERE `tid`=:tid";
 
    // prepare the query
    $stmt = $this->conn->prepare( $query );
    // unique ID of record to be edited
    $this->tid=htmlspecialchars(strip_tags($this->tid));
    $stmt->bindParam(':tid', $this->tid);

   if($stmt->execute()){
        return true;
    }
 
    // return false if email does not exist in the database
    $this->errmsg=implode(",",$stmt->errorInfo());
    return false;
}

//Get All templates
function getalltemplates(){
 
    // query to check if email exists
    $query = "SELECT `tid`,`tname`,`tdetails`, `eventid`, `eventname` FROM  certtemplateview";
 
    // prepare the query
    $stmt = $this->conn->prepare( $query );

    $stmt->execute();
 
    // get number of rows
    $num = $stmt->rowCount();
 
    if($num>0){
 
        // get record details / values
		$this->alltemplates=$stmt->fetchAll(PDO::FETCH_ASSOC);
		//echo json_encode($allusers);
        return true;
    }
 
    // return false if email does not exist in the database
    $errmsg=implode(",",$stmt->errorInfo());
    return false;
}

//Get a Single template
function gettemplate(){
 
    // query to check if email exists
    $query = "SELECT `tid`,`tname`,`tdetails`, `eventid`, `eventname` FROM  certtemplateview WHERE `tid`=:tid";
 
    // prepare the query
    $stmt = $this->conn->prepare( $query );
    // unique ID of record to be edited
    $this->tid=htmlspecialchars(strip_tags($this->tid));
    $stmt->bindParam(':tid', $this->tid);

    $stmt->execute();
 
    // get number of rows
    $num = $stmt->rowCount();
 
    if($num>0){
 
        // get record details / values
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->tname=$row['tname'];
        $this->tdetails=$row['tdetails'];
        $this->eventid=$row['eventid'];
        $this->eventname=$row['eventname'];
        return true;
    }
 
    // return false if email does not exist in the database
    $this->errmsg=implode(",",$stmt->errorInfo());
    return false;
}
function gettemplatecount(){

     // query to check if email exists
     $query = "SELECT count(*) as templatecount FROM " . $this->table_name;
 
     // prepare the query
     $stmt = $this->conn->prepare( $query );
 
     $stmt->execute();
  
     // get number of rows
     $num = $stmt->rowCount();
  
     if($num>0){
  
         // get record details / values
         $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->templatecount=$row['templatecount'];
         //echo json_encode($allusers);
         return true;
     }
  
     // return false if email does not exist in the database
     $this->errmsg=implode(",",$stmt->errorInfo());
     return false;
}

}