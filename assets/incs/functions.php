<?php
	if(isset($_SESSION['matricno'])){
    $id = $_SESSION['matricno'];
    $sql="SELECT * FROM students WHERE matric_no='".$id."'";
    $result=runSQL($sql);
    $data=mysqli_fetch_array($result);
    $id=$data['id'];
  }elseif(isset($_SESSION['login_id'])){
    $a_id = $_SESSION['login_id'];
    $sql="SELECT * FROM staffs WHERE login_id='".$a_id."'";
    $result=runSQL($sql);
    $data=mysqli_fetch_array($result);
    $id=$data['id'];

  }else{}
?>