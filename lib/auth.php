<?php
include_once 'config/database.php';
include_once 'libs/user.php';

class Auth
{
    private $jwt;
    private $msg;
    private $user_id;
    private $username;
    private $usr;
    private $userinfo;
    public $menu;
    public $dashboard;
    public function __construct(){
       // get database connection
        $database = new Database();
        $db = $database->getConnection();
        $this->usr= new User($db);
    }
    public function login($user_id,$user_pass)
    {
        
       // $curl=curl_init();
       $this->usr->user_id=$user_id;
       if($this->usr->emailExists() && md5($user_pass)==$this->usr->user_pass)
       {
                $result=json_encode(
                    array(
                        "success"=>"1",

                        "message" => "Successful login."
                    )
                );
                $this->user_id=$this->usr->user_id;
                $this->username=$this->usr->username;
                $_SESSION["user_id"]=$this->user_id;
                return 1;
       }
       else
       {
        $result=json_encode(
            array(
                "success"=>"0",
                "message" => $this->usr->errmsg
            )
        );
           return 0;
       }
       
    }
    
    public function getUser()
    {
        //echo($_SESSION["user_id"]);
        if(isset($_SESSION["user_id"]))
        {
            // set user property values here
            $userinfo=array("firstname"=>$this->usr->username,"user_id"=>$this->usr->user_id);
            //print_r($userinfo);
            return $userinfo;
        }
        else
        {
            return $userinfo;
        }
    }
    public function getMenu()
    {
        if(isset($_SESSION["user_id"]))
        {
            
        $result= file_get_contents("/lib/menu.json");
        if(!$result){die($this->usr->errmsg);}
        $this->menu=$result;
        }
    }
    public function getDashboard()
    {
        if(isset($_SESSION["user_id"]))
        {
            $result=$this->usr->getDashboard();
            if(!$result){die($this->usr->errmsg);}
            $this->dashboard=$result;
        }

    }
    /*private function callAPI($url, $data){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);

       // print_r($result);
        curl_close($ch);
        return $result;
     }*/
     public function logout()
     { 
            session_destroy();
            header('Location: /pages/auth/login.php');
     }
}
?>