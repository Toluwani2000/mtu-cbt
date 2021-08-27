<?php session_start(); error_reporting();
?>
<?php
  require_once('../t_conn/url.php');
  require_once('../t_conn/dbc.php');
  //if(isset($_SESSION['t_email'])){}else{die("<script>window.location.href='".$dir."'</script>");}

    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $matricno = $_POST['matricno'];
    $college = $_POST['college'];
    $department = $_POST['department'];
    $course = $_POST['course'];
    $password = $_POST['password'];
    $conpassword = $_POST['conpassword'];

    //
   if(
    !empty($firstname) && !empty($surname) && !empty($matricno) && !empty($college) && !empty($department) && !empty($course) && !empty($password) && !empty($conpassword)
    ){
        //do nothing
    }else{
        die("<div class='alert alert-danger'>A required field is empty.</div>");
    }
    if($password == $conpassword ){
        //do nothing
    }else{
        die("<div class='alert alert-info'>Password does not match. Retype password.</div>");
    }

    $sql="
			INSERT INTO students
			(firstname,surname,matric_no,college,department,course,password)
			VALUES
			('".$firstname."','".$surname."','".$matricno."','".$college."','".$department."','".$course."','".$password."')";
			$result=runSQL($sql);
			if($result){
				echo "<div class='alert alert-success'>Registration successful. This is your login id:'".$matricno."'</div>";
			}else{
				echo "<div class='alert alert-danger'>Error Registering user error. Try again later</div>";
			}

?>