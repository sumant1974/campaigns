<?php

/* Getting file name */
$filename = $_POST["filename"];
/* Location */
$location = '/var/lib/tomcat7/webapps/testin/';

$response = array();
$response['status']=0;
$response['msg']="$location.$filename will be deleted";
/* Upload file */
if (file_exists($location.$filename)) {
    if(unlink($location.$filename))
    {
        $response['status']=1;
        $response['msg']="Image Deleted Successfully";
    }
    else
    {
        $response['status']=0;
        $response['msg']="Error deleting Image";
    }
  }
else
{
    $response['status']=0;
    $response['msg']="Image file does not exist.";
}
echo json_encode($response);    
exit;