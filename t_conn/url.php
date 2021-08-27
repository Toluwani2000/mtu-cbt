<?php
$server = $_SERVER['SERVER_NAME'];
//$other_part = $_SERVER['REQUEST_URI'];
if(strtolower($server) == "localhost"){
$webDir = "http://$server:8012/codes/mtu-e-cbt/";
}else{
$webDir  = "https://$server/";
}

$f_url=substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['SERVER_NAME'],'/'));
$f_url="http://$server".$f_url."";

?>
