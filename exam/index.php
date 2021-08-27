<?php
    session_start(); error_reporting();
    if(!isset($_SESSION['matric_no'])){}else{header('location: ../exam/');}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        require_once("../assets/conn/url.php");
        require_once("../assets/conn/dbc.php");
         //meta info
 		$page_name="MTU E-CBT";
        require_once("../assets/incs/metas.php");
        require_once("../assets/incs/scripts-top.php");
        ?>
        <style>
            .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #775aa6   ;
            color: white;
            text-align: center;
            }
        </style>
</head>
<body>
    <?php 
        require_once("../assets/incs/nav.php");
    ?>
        <div class="row">
            <?php 
                require_once("questions.php");
                ?>
        </div>
        <div class="row" style="padding-bottom: 60px;">
            <div class="col-md-3">
                <a href="<?php echo $dir;?>submit-test/" class="btn btn-primary">Submit Test</a>
            </div>
        <div>
        <div class="row">
            <div class="footer" style="margin-top: 40px;">
                <p>Footer</p>
            </div>
        <div>
    <?php
        require_once("../assets/incs/scripts-bottom.php");
    ?>
</body>
</html

