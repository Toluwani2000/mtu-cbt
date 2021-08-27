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
</head>
<body>
    <?php 
        require_once("../assets/incs/nav.php");
    ?>
        <div class="row">
            <div class="col-md-8">
                <h1>
                    You score is: <b>3/5</b>
                </h1>
            </div>
        <div>
    <?php
        require_once("../assets/incs/scripts-bottom.php");
    ?>
</body>
</html

