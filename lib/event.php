<?php
include_once 'libs/events.php';
include_once 'config/database.php';
class Event
{
    public $eventid;
    public $eventname;
    public $eventwebsite;
    private $events;
    public function __construct(){
       // get database connection
       $database = new Database();
       $db = $database->getConnection();
        $this->events=new events($db);
    }
    
    public function create()
    {
        if(!empty($this->eventname) && !empty($this->eventwebsite))
        {
            $this->events->eventname=$this->eventname;
            $this->events->eventwebsite=$this->eventwebsite;
            $result=$this->events->create();
            //print_r($result);
            if(!$result){die("Connection Failure");}
            $result=json_encode(
                array(
                    "status"=>"1",
                    "message" => "Event Created Successfully."
                )
            );
            return $result;
        }
        else
        {
            $result=json_encode(
                array(
                    "status"=>"0",
                    "message" => "Error:Required data not supplied to create event."
                )
            );
            return $result;
        }
    }
    public function update()
    {
        if(!empty($this->eventid) && !empty($this->eventname) && !empty($this->eventwebsite))
        {
            $this->events->eventid=$this->eventid;
            $this->events->eventname=$this->eventname;
            $this->events->eventwebsite=$this->eventwebsite;
            $result=$this->events->update();
            //print_r($result);
            if(!$result){die($this->events->errmsg);}
            $result=json_encode(
                array(
                    "status"=>"1",
                    "message" => "Event Updated Successfully."
                )
            );
            return $result;
        }
        else
        {
            $result=json_encode(
                array(
                    "status"=>"0",
                    "message" => "Error:Required data not supplied to update event."
                )
            );
            return $result;
        }
        
    }
    public function delete()
    {
        if(!empty($this->eventid))
        {
            $this->events->eventid=$this->eventid;
            $result=$this->events->delete();
            //print_r($result);
            if(!$result){die("Connection Failure");}
            $result=json_encode(
                array(
                    "status"=>"1",
                    "message" => "Event Deleted Successfully."
                )
            );
            return $result;
        }
        else
        {
            $result=json_encode(
                array(
                    "status"=>"0",
                    "message" => "Error:Required data not supplied to delete event."
                )
            );;
            return $result;
        }
        
    }
   public function getevents()
   {
        $this->events->getallevents();
        $this->allevents=$this->events->allevents;
        $this->events->geteventcount();
        $ecount=$this->events->eventcount;
        //print_r($result);
        //if(!$allevents){die($this->events->errmsg);}
        $result=json_encode(
            array(
                 "eventscount"=>"$ecount",
                "events" => $this->allevents
            )
        );
        return $result;
   }
   public function getevent()
   {
    if(!empty($this->eventid))
    {
        $this->events->eventid=$this->eventid;
        $result=$this->events->getevent();
        //print_r($result);
        if(!$result){die("Connection Failure");}
        $result=json_encode(
            array(
                "eventname"=>$this->events->eventname,
                "eventwebsite" => $this->events->eventwebsite
            )
        );
        return $result;
    }
    else
    {
        $result=json_encode(
            array(
                "status"=>"0",
                "message" => "Error:Required data not supplied to delete event."
            )
        );;
        return $result;
    }
   }
     
}
?>