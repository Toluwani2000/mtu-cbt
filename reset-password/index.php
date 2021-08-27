<?php
    session_start(); error_reporting();
    if(!isset($_SESSION['login_id'])){}else{header('location: ../admin-login/');}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        require_once("../assets/conn/url.php");
        require_once("../assets/conn/dbc.php");
        require_once("../assets/incs/functions.php");
         //meta info
 		$page_name="Reset Password";
        require_once("../assets/incs/metas.php");
        require_once("../assets/incs/scripts-top.php");
    ?>
</head>
<body>
    <?php 
        require_once("../t_incs/nav.php");
    ?>
    <div class="row" style="margin:90px 0;">
        <div class="offset-md-4 col-md-4" align="center">
            <form method="POST" action="" id="form">
                <div class="form-group">
                    <input name="loginId" type="text" value="admin" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <input name="old_password" type="password" placeholder="Current Password" class="form-control">
                </div> 
                <div class="form-group">
                    <input name="new_password" type="password" placeholder="New Password" class="form-control">
                </div> 
                <div class="form-group">
                    <input name="retyped_password" type="password" placeholder="Repeat New Password" class="form-control">
                </div>
                <button class="btn btn-primary btn-block" id="submit" type="submit">Sign In</button>
            </form>
            <div id="formresult"></div>
        </div>
    </div>

    <?php 
        require_once("../assets/incs/scripts-bottom.php");
    ?>
    <script>
    $(document).ready(function(){
        var form = $("#form");
        var submit = $("#submit");
        var submit_val = submit.html();
        var formresult = $("#formresult");
        form.on('submit',(function(e){
          e.preventDefault();
          submit.attr('disabled','');
          submit.html("<i class='fa fa-cog fa fa-spin white'></i> Processing");
          formresult.html("<div class='alert alert-warning'> Taking too long? <a href=''>Reload </a></div>");
          $.ajax({
            url:"save.php",
            type:"POST",
            data:new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            success:function(result){
              submit.removeAttr('disabled');
              submit.html(submit_val);
              formresult.html(result);
            }
            
          });
        }));
    });
    </script>
</body>
</html>