<?php
include_once 'libs/templates.php';
include_once 'config/database.php';
class template
{
    public $tid;
    public $tname;
    public $tdetails;
    public $eventid;
    private $templates;
    public function __construct(){
       // get database connection
       $database = new Database();
       $db = $database->getConnection();
        $this->templates=new templates($db);
    }
    
    public function create()
    {
        if(!empty($this->tname) && !empty($this->tdetails) && !empty($this->eventid))
        {
            $this->templates->tname=$this->tname;
            $this->templates->tdetails=$this->tdetails;
            $this->templates->eventid=$this->eventid;
            $result=$this->templates->create();
            //print_r($result);
            if(!$result){die($this->templates->errmsg);}
            $result=json_encode(
                array(
                    "status"=>"1",
                    "message" => "Template Created Successfully."
                )
            );
            return $result;
        }
        else
        {
            $result=json_encode(
                array(
                    "status"=>"0",
                    "message" => "Error:Required data not supplied to create template."
                )
            );
            return $result;
        }
    }
    public function update()
    {
        if(!empty($this->tid) && !empty($this->tname) && !empty($this->tdetails) && !empty($this->eventid))
        {
            $this->templates->tid=$this->tid;
            $this->templates->tname=$this->tname;
            $this->templates->tdetails=$this->tdetails;
            $this->templates->eventid=$this->eventid;
            $result=$this->templates->update();
            //print_r($result);
            if(!$result){die($this->templates->errmsg);}
            $result=json_encode(
                array(
                    "status"=>"1",
                    "message" => "Template Updated Successfully."
                )
            );
            return $result;
        }
        else
        {
            $result=json_encode(
                array(
                    "status"=>"0",
                    "message" => "Error:Required data not supplied to update template."
                )
            );
            return $result;
        }
        
    }
    public function delete()
    {
        if(!empty($this->tid))
        {
            $this->templates->tid=$this->tid;
            $result=$this->templates->delete();
            //print_r($result);
            if(!$result){die("Connection Failure");}
            $result=json_encode(
                array(
                    "status"=>"1",
                    "message" => "Template Deleted Successfully."
                )
            );
            return $result;
        }
        else
        {
            $result=json_encode(
                array(
                    "status"=>"0",
                    "message" => "Error:Required data not supplied to delete template."
                )
            );;
            return $result;
        }
        
    }
   public function gettemplates()
   {
        $this->templates->getalltemplates();
        $this->alltemplates=$this->templates->alltemplates;
        $this->templates->gettemplatecount();
        $ecount=$this->templates->templatecount;
        //print_r($result);
        //if(!$alltemplates){die($this->templates->errmsg);}
        $result=json_encode(
            array(
                 "templatescount"=>"$ecount",
                "templates" => $this->alltemplates
            )
        );
        return $result;
   }
   public function gettemplate()
   {
    if(!empty($this->tid))
    {
        $this->templates->tid=$this->tid;
        $result=$this->templates->gettemplate();
        //print_r($result);
        if(!$result){die("Connection Failure");}
        $result=json_encode(
            array(
                "tname"=> $this->templates->tname,
                "tdetails" => $this->templates->tdetails,
                "eventid" => $this->templates->eventid,
                "eventname" => $this->templates->eventname
            )
        );
        return $result;
    }
    else
    {
        $result=json_encode(
            array(
                "status"=>"0",
                "message" => "Error:Required data not supplied to get template."
            )
        );;
        return $result;
    }
   }
     
}
?>