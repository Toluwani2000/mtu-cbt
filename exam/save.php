<?php session_start(); error_reporting();?>
<?php
    require_once('../assets/conn/url.php');
    require_once('../assets/conn/dbc.php');
    require_once('../assets/incs/functions.php');
    if(!isset($_SESSION['matricno'])){}else{die("<script>window.location.href='".$dir."signin/'</script>");}
    

?>