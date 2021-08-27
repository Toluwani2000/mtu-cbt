<?php
    // session_start(); error_reporting();
    // if(!isset($_SESSION['matric_no'])){}else{header('location: ../exam/');}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        require_once("../assets/conn/url.php");
        require_once("../assets/conn/dbc.php");
         //meta info
 		$page_name="Create a course";
        require_once("../assets/incs/metas.php");
        require_once("../assets/incs/scripts-top.php");
    ?>
</head>
<body>
    <?php
        require_once("../t_incs/nav.php");
    ?>
    <div class="row pl-4">
        <div class="col-md-6">
            <form method="POST" id="form" action="">
                <div class="form-group">
                    <label for="course">course code:</label>
                    <input type="text" class="form-control" name="course">
                </div>
                <div class="form-group">
                    <label for="coursetitle">Course Title:</label>
                    <input type="text" class="form-control" name="coursetitle">
                </div>
                <button class="btn btn-primary" type="submit" id="submit">Post</button>
                <a href="<?php echo $dir;?>questions-create/" class="btn btn-success">Create Questions</a>
            </form>
        </div>
        <div id="formresult"></div>
    <div>

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