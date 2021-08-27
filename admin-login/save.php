<?php session_start(); error_reporting(); ?>
<?php
  require_once('../t_conn/url.php');
  require_once('../t_conn/dbc.php');

    $loginId = $_POST['loginId'];
    $password = $_POST['password'];

    //
   if(!empty($loginId) && !empty($password)){
        //do nothing
    }else{
        die("<div class='alert alert-danger'>A required field is empty.</div>");
    }

    $sql="SELECT count(*) as sum from staffs";
    $result=runSQL($sql);
    $data=mysqli_fetch_array($result);
    $sum=$data['sum'];
    $login_Id = "admin";
    $password_con = 12345;
    if($sum == 0 && $loginId == $login_Id && $password == $password_con){
        echo("<div class='alert alert-success'>Login Successful. Redirecting.. please wait.</div> <script>window.location.href='../reset-password/'</script> ");
    }else{
      $sql="SELECT * from staffs WHERE login_id='".$loginId."' && password='".$password."'";
      $result=runSQL($sql);
      if($result){
          $_SESSION['login_id'] = $staff_id;
          echo("<div class='alert alert-success'>Login Successful on intitial. Redirecting.. please wait.</div> <script>window.location.href='../dashboard/'</script> ");
      }else{
          die("<div class='alert alert-danger'>Login failed. Try again.</div>");
      }
          
    }
?>