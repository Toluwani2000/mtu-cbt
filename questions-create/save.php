<?php session_start(); error_reporting(); ?>
<?php
      require_once("../assets/conn/url.php");
      require_once("../assets/conn/dbc.php");

    $coursecode = $_POST['course'];
    $question = $_POST['question'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];
    $answer = $_POST['answer'];

    if(!empty($coursecode) && !empty($question) && !empty($option1) && !empty($option2) && !empty($option3) && !empty($option4) && !empty($answer)){
         //do nothing
     }else{
         die("<div class='alert alert-danger'>A required field is empty.</div>");
     }

    $sql="INSERT INTO questions
    (course,questions,option_a,option_b,option_c,option_d,answer)
    VALUES
    ('".$coursecode."','".$question."','".$option1."','".$option2."','".$option3."','".$option4."','".$answer."')
    ";
    $result=runSQL($sql);
    if($result){
      echo("<div class='alert alert-success'>Questions uploaded</div>");
    }else{
      die("<div class='alert alert-danger'>Upload failed try again.</div>");
    }

?>