<?php
    session_start(); error_reporting();
    if(isset($_SESSION['login_id'])){header('location: ../dashboard/');}else{}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        require_once("../assets/conn/url.php");
        require_once("../assets/conn/dbc.php");
        require_once("../assets/incs/functions.php");
         //meta info
 		$page_name="MTU E-CBT";
        require_once("../assets/incs/metas.php");
        require_once("../assets/incs/scripts-top.php");
    ?>
</head>
<body>
    <?php 
        // require_once("../assets/incs/nav.php");
    ?>
    <div class="row" style="margin:90px 0;">
        <div class="offset-md-4 col-md-4" align="center">
            <img src="<?php echo $dir;?>assets/files/images/images.jpeg" alt="">
            <form method="POST" action="" id="form">
                <div class="form-group">
                    <input name="loginId" type="text" placeholder="Login ID" class="form-control">
                </div>
                <div class="form-group">
                    <input name="password" type="password" placeholder="Password" class="form-control">
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