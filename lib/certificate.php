<?php
include_once 'libs/certificates.php';
include_once 'config/database.php';
class certificate
{
    public $allcertificates;
    private $certificates;
    private $studevents;
    public function __construct(){
       // get database connection
       $database = new Database();
       $db = $database->getConnection();
        $this->certificates=new certificates($db);
    }
public function getcertificatecount()
{
    $this->certificates->getCertificatecount();
        $ecount=$this->certificates->certcount;
        $result=json_encode(
            array(
                 "certcount"=>"$ecount"
            )
        );
        return $result;
}
   public function getcertificates($eventid="")
   {
        $this->certificates->getallCertificates($eventid);
        $this->allcertificates=$this->certificates->allCertificates;
        $this->certificates->getCertificatecount();
        $ecount=$this->certificates->certcount;
        //print_r($result);
        //if(!$allcertificates){die($this->certificates->errmsg);}
        $result=json_encode(
            array(
                 "certcount"=>"$ecount",
                "certificates" => $this->allcertificates
            )
        );
        return $result;
   }
}
?>