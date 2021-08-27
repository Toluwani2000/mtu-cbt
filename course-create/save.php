<?php session_start(); error_reporting(); ?>
<?php
      require_once("../assets/conn/url.php");
      require_once("../assets/conn/dbc.php");

    $coursecode = $_POST['course'];
    $coursetitle = $_POST['coursetitle'];

    if(!empty($coursecode) && !empty($coursetitle)){
         //do nothing
     }else{
         die("<div class='alert alert-danger'>A required field is empty.</div>");
     }

    $sql="INSERT INTO courses
    (course_code,course_title)
    VALUES
    ('".$coursecode."','".$coursetitle."')
    ";
    $result=runSQL($sql);
    if($result){
      echo("<div class='alert alert-success'>Questions uploaded</div>");
    }else{
      die("<div class='alert alert-danger'>Upload failed try again.</div>");
    }

?>