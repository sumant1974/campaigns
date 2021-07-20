<?php
//Global functions to be used in php files will be listed here
ini_set('session.cookie_samesite','None');
ini_set('session.cookie_secure','On');
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function rgbtohex($iRed, $iGreen, $iBlue)
{
    if($iRed > 255 || $iGreen > 255 || $iBlue > 255){
        die('One of the color values is above 255.');
    }
    $sHexValue = dechex($iRed) . dechex($iGreen) . dechex($iBlue);
    $HexValue = '#' . $sHexValue;
    return $HexValue;
}
$userinfo=null;
  //include_once 'functions.php';
if(isset($_SESSION["userinfo"]))
{
  $userinfo=$_SESSION["userinfo"];
}
else
{
   header('Location: /pages/auth/login.php');
}