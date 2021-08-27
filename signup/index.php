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
    <?php ?>
    <div class="row" style="margin:20px 0;">
        <div class="offset-md-4 col-md-4" align="center">
            <img src="<?php echo $dir;?>assets/files/images/images.jpeg" alt="">
            <form method="POST" action="" id="form">
            <?php

                $curl = curl_init();

                curl_setopt_array($curl, [
                    CURLOPT_URL => "https://alchera-face-authentication.p.rapidapi.com/v1/face",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => "-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"image\"\r\n\r\n\r\n-----011000010111000001101001--\r\n\r\n",
                    CURLOPT_HTTPHEADER => [
                        "content-type: multipart/form-data; boundary=---011000010111000001101001",
                        "uid: vghv",
                        "x-rapidapi-host: alchera-face-authentication.p.rapidapi.com",
                        "x-rapidapi-key: d4acde7d32mshf047612f0c2a1dbp1a9aedjsn43566b5a5f0e"
                    ],
                ]);

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) {
                    echo "cURL Error #:" . $err;
                } else {
                    echo $response;
                }
                ?>
                <div class="form-group">
                    <input name="firstname" type="text" placeholder="Firstname" class="form-control">
                </div>
                <div class="form-group">
                    <input name="firstname" type="text" placeholder="Firstname" class="form-control">
                </div>
                <div class="form-group">
                    <input name="surname" type="text" placeholder="Surname" class="form-control">
                </div>
                <div class="form-group">
                    <input name="matricno" type="text" placeholder="Matric No" class="form-control">
                </div>
                <div class="form-group">
                   <select class="form-control" name="college">
                       <option value="">College</option>
                       <option>College of Basic and Applied Sciences</option>
                       <option>College of Humanities, Management and Social Sciences</option>
                   </select>
                </div>
                <div class="form-group">
                   <select class="form-control" name="department">
                       <option value="">Department</option>
                       <option>Computer Science & Mathematics</option>
                       <option>Biological Sciences</option>
                       <option>Chemical Sciences</option>
                       <option>Economics</option>
                       <option>Accounting & Finance</option>
                   </select>
                </div>
                <div class="form-group">
                   <select class="form-control" name="course">
                       <option value="">Course</option>
                       <option>Computer Science</option>
                       <option>Mathematics</option>
                       <option>Microbiology</option>
                       <option>Biochemistry</option>
                       <option>Accounting</option>
                       <option>Economics</option>
                       <option>IRPM</option>
                       <option>Business Administration</option>
                       <option>Music</option>
                   </select>
                </div>
                <div class="form-group">
                    <input name="password" type="password" placeholder="Password" class="form-control">
                </div>
                <div class="form-group">
                    <input name="conpassword" type="password" placeholder="Confirm Password" class="form-control">
                </div>
                <button class="btn btn-primary" type="submit" name="submit" id="submit">Submit</button>
                <a class="btn btn-primary" href="<?php echo $dir;?>signin/">Sign In</a>
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