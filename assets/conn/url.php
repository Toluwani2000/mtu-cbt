<?php 
$server = $_SERVER['SERVER_NAME'];
//$other_part = $_SERVER['REQUEST_URI'];
if(strtolower($server) == "localhost"){
$dir = "http://$server:8012/codes/mtu-e-cbt/"; 	
}else{
$dir = "https://$server/"; 
}
?>