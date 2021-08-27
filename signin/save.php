<?php session_start(); error_reporting(); ?>
<?php
  require_once('../t_conn/url.php');
  require_once('../t_conn/dbc.php');

    $matricno = $_POST['matricno'];
    $password = $_POST['password'];

    //
   if(!empty($matricno) && !empty($password)){
        //do nothing
    }else{
        die("<div class='alert alert-danger'>A required field is empty.</div>");
    }

    $sql="SELECT * from students WHERE matric_no='".$matricno."'";
    $result=runSQL($sql);
    if($result){
      $_SESSION['matric_no'] = $u_id;
      echo("<div class='alert alert-success'>Login Successful. Redirecting.. please wait.</div> <script>window.location.href='../exam/'</script> ");
    }else{
      die("<div class='alert alert-danger'>Login failed. Try again.</div>");
    }

?>