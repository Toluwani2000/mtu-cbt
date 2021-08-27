<?php session_start(); error_reporting();?>
<?php
    require_once('../assets/conn/url.php');
    require_once('../assets/conn/dbc.php');
    require_once('../assets/incs/functions.php');
    if(isset($_SESSION['login_id'])){}else{die("<script>window.location.href='".$dir."dashboard/'</script>");}

  $subscription = RMC($_POST['subscription']);
  if(!empty($subscription)){ }else{die('<div class="alert alert-warning">Error while processing request.</div>');}
  $sql4="UPDATE subscription_form SET deleted='1' WHERE deleted < 1 AND id='".$subscription."'";
  $result=runSQL($sql4);
  if($result){
    $feedback="<div class='alert alert-success'>Subscription deleted.</div>";
  }else{
    $feedback="<div class='alert alert-danger'>Error deleting subscription. Code T210</div>";
  }
  echo $feedback;

?>