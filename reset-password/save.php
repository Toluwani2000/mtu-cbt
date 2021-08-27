<?php session_start(); error_reporting(); ?>
<?php
  require_once('../t_conn/url.php');
  require_once('../t_conn/dbc.php');

    echo $login_id = $_POST['loginId'];
    echo $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $retyped_password = $_POST['retyped_password'];

    //
   if(!empty($login_id) && !empty($old_password) &&  !empty($new_password) && !empty($retyped_password)){
        //do nothing
    }else{
        die("<div class='alert alert-danger'>A required field is empty.</div>");
    }
    $sql="SELECT count(*) as sum FROM staffs";
    $result=runSQL($sql);
    $data=mysqli_fetch_array($result);
    $sum=$data['sum'];
    if($sum == 0){
        if($login_id == "admin" && $old_password == 12345){
            if($new_password == $retyped_password){
                $sql="
                INSERT INTO staffs 
                (login_id,password)
                VALUES
                ('".$login_id."','".$new_password."')";
                $result = runSQL($sql);
                if($result){
                    echo("<div class='alert alert-successful'>Password reset successful.</div> <script>window.location.href='../dashboard/'</script>");
                }else{
                    die("<div class='alert alert-danger'>Error occured. Try again</div>");             
                }
            }else{
                die("<div class='alert alert-danger'>Password do not match. Try again</div>");             
            }
        }else{
            die("<div class='alert alert-danger'>Incorrect old password.</div>"); 
        }
    }else{
        $sql="UPDATE staffs SET 
        password='".$new_password."' WHERE login_id='".$loginId."'
        ";
        $result=runSQL($sql);
        if($result){
            echo("<div class='alert alert-success'>Password reset Successful.</div>");
        }else{
            die("<div class='alert alert-danger'>Password reset failed. Try again.</div>");
        }
    }          
?>