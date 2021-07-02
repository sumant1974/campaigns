<?php
// 'events' object
class events{
 
    // database connection and table name
    private $conn;
    private $table_name = "Events";

    //variables
    public $eventid;
    public $eventname;
    public $eventwebsite;
    public $allevents;
     public $eventcount;
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
                    eventname = :eventname,
                    website = :eventwebsite"
                    ;
     
        // prepare the query
        $stmt = $this->conn->prepare($query);
     
        // sanitize
        
        $this->eventname=htmlspecialchars(strip_tags($this->eventname));
        $this->eventwebsite=htmlspecialchars(strip_tags($this->eventwebsite));
         
        // bind the values
        
        $stmt->bindParam(':eventname', $this->eventname);
        $stmt->bindParam(':eventwebsite', $this->eventwebsite);
    
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
                eventname = :eventname,
                website = :eventwebsite
            WHERE
                eventid=:eventid";
 
    // prepare the query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->eventname=htmlspecialchars(strip_tags($this->eventname));
    $this->eventwebsite=htmlspecialchars(strip_tags($this->eventwebsite));
 
    // bind the values from the form
    $stmt->bindParam(':eventname', $this->eventname);
    $stmt->bindParam(':eventwebsite', $this->eventwebsite);
    
    // unique ID of record to be edited
    $this->eventid=htmlspecialchars(strip_tags($this->eventid));
    $stmt->bindParam(':eventid', $this->eventid);
 
    // execute the query
    if($stmt->execute()){
        return true;
    }
 
    $this->errmsg=implode(",",$stmt->errorInfo());
    return false;
}

function delete(){
 
    // query to check if email exists
    $query = "DELETE FROM " . $this->table_name . " WHERE `eventid`=:eventid";
 
    // prepare the query
    $stmt = $this->conn->prepare( $query );
    // unique ID of record to be edited
    $this->eventid=htmlspecialchars(strip_tags($this->eventid));
    $stmt->bindParam(':eventid', $this->eventid);

   if($stmt->execute()){
        return true;
    }
 
    // return false if email does not exist in the database
    $this->errmsg=implode(",",$stmt->errorInfo());
    return false;
}

//Get All Events
function getallevents(){
 
    // query to check if email exists
    $query = "SELECT `eventid`,`eventname`,`website` FROM " . $this->table_name;
 
    // prepare the query
    $stmt = $this->conn->prepare( $query );

    $stmt->execute();
 
    // get number of rows
    $num = $stmt->rowCount();
 
    if($num>0){
 
        // get record details / values
		$this->allevents=$stmt->fetchAll(PDO::FETCH_ASSOC);
		//echo json_encode($allusers);
        return true;
    }
 
    // return false if email does not exist in the database
    $errmsg=implode(",",$stmt->errorInfo());
    return false;
}

//Get a Single Event
function getevent(){
 
    // query to check if email exists
    $query = "SELECT `eventid`,`eventname`,`website` FROM " . $this->table_name . " WHERE `eventid`=:eventid";
 
    // prepare the query
    $stmt = $this->conn->prepare( $query );
    // unique ID of record to be edited
    $this->eventid=htmlspecialchars(strip_tags($this->eventid));
    $stmt->bindParam(':eventid', $this->eventid);

    $stmt->execute();
 
    // get number of rows
    $num = $stmt->rowCount();
 
    if($num>0){
 
        // get record details / values
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->eventname=$row['eventname'];
        $this->eventwebsite=$row['eventwebsite'];
        return true;
    }
 
    // return false if email does not exist in the database
    $this->errmsg=implode(",",$stmt->errorInfo());
    return false;
}
function geteventcount(){

     // query to check if email exists
     $query = "SELECT count(*) as eventcount FROM " . $this->table_name;
 
     // prepare the query
     $stmt = $this->conn->prepare( $query );
 
     $stmt->execute();
  
     // get number of rows
     $num = $stmt->rowCount();
  
     if($num>0){
  
         // get record details / values
         $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->eventcount=$row['eventcount'];
         //echo json_encode($allusers);
         return true;
     }
  
     // return false if email does not exist in the database
     $this->errmsg=implode(",",$stmt->errorInfo());
     return false;
}

}