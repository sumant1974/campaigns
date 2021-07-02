<?php

/* Getting file name */
$filename = $_POST["tid"]."-".$_FILES['file']['name'];
$tid = $_POST["tid"];
/* Location */
$location = '/var/lib/tomcat7/webapps/testin/';

$response = array();
/* Upload file */
if (file_exists($location.$filename)) {
    $response['status']=0;
    $response['msg']="File with this filename already exists for this template, choose a different file.";
  }
else
{
if(move_uploaded_file($_FILES['file']['tmp_name'],$location.$filename)){
    $response['filename']=$filename;
    $response['status']=1;
    $response['msg']="File Uploaded Successfully";
} else{
    $response['status']=0;
    $response['msg']="Error in File Uploading";
}
}
echo json_encode($response);    
exit;