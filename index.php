<?php
    session_start(); error_reporting();
    if(!isset($_SESSION['matric_no'])){}else{header('location: ../exam/');}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        require_once("assets/conn/url.php");
        require_once("assets/conn/dbc.php");
        require_once("assets/incs/functions.php");
         //meta info
 		$page_name="MTU E-CBT";
        require_once("assets/incs/metas.php");
        require_once("assets/incs/scripts-top.php");
    ?>
</head>
<body>
    <div class="row" style="margin-top:180px;">
        <div class="offset-md-4 col-md-4" align="center">
            <img src="<?php echo $dir;?>assets/files/images/images.jpeg" alt="">
            <p>Welcome to proceeed with your examination click next.</p>
            <a href="<?php echo $dir;?>signin/" class="btn btn-primary">Next</a>
        </div>
    </div>
</body>
</html>