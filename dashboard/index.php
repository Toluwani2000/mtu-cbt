<?php 
session_start(); error_reporting(0);
if(isset($_SESSION['login_id'])){header('location: ../admin-login/');}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        require_once("../assets/conn/url.php");
        require_once("../assets/conn/dbc.php");
        require_once("../assets/incs/functions.php");
        //meta info
 		$page_name="Dashboard";
        require_once("../assets/incs/metas.php");
        require_once("../assets/incs/scripts-top.php");
    ?>
</head>
<body>
    <?php
        require_once("../t_incs/nav.php");
        ?>
    <div class="container">

        <div class="row">
            <div class="offset-lg-4 offset-md-3 col-lg-6 col-md-7 my-4">
                <h1>Recent Subscriptions</h1>
            </div>
            <div class="offset-lg-1 col-lg-10 col-md-12">
                <div class="table-responsive">
                    <div id="data_result"></div>
                    <?php 
                        $sql="SELECT count(*) as sum FROM questions";
                        $result=runSQL($sql);
                        $data=mysqli_fetch_array($result);
                        $sum=$data['sum'];
                        if($sum > 0){
                    ?>
                    <table class="table table-hover">
                        <thead>
                            <th>#</th>
                            <th scope="row">Name of Course</th>
                            <th scope="row">No of questions</th>
                            <th scope="row">Task</th>
                        </thead>
                        <tbody>
                            <?php
                                $num=1;
                                $sql="SELECT * FROM questions";
                                $result=runSQL($sql);
                                while($row=mysqli_fetch_array($result)){
                            ?>
                            <tr id="box">
                                <td>
                                    <?php echo $num++; ?>
                                </td>
                                <td>
                                    <?php echo $row['course'];?>
                                </td>
                                <td>
                                    <?php echo $row['id'];?>
                                    <?php 
                                        $sql="SELECT COUNT(questions) FROM questions";
                                        $result=runSQL($sql);
                                        $data=mysqli_fetch_array($result);
                                        echo $question=$data['questions'];
                                    ?>
                                </td>
                                <td>
                                    <div class="dropdown dropright">
                                        <button type="button" class="btn btn-outline-info dropdown-toggle" data-toggle="dropdown">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="<?php echo $dir;?>subscription/?su_id=<?php echo $row['id'];?>" target="_blank" class="dropdown-item">View</a>
                                            <a class="dropdown-item" href="#">Send</a>
                                            <button class="dropdown-item delt" name="submit" type="button" data-id="<?php echo $row['id'];?>">Delete</button>
                                        </div>
                                    </div> 
                                </td>
                            </tr>
                            <?php 
                                 } 
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
               
        </div>
        <?php 
        }else{
            echo"<h1 class='mt-5 pt-5'>No questions has been added yet.</h1>";
        }
        ?>
    </div>
    <script>
      $(document).ready(function(){
          alert();
        var submit = $('.delt');
        var submit_val = submit.html();
        var data_result = $('#data_result');
        submit.click(function(){
          var btn = $(this);
          btn.attr('disabled','');
          btn.html("<i class='fa fa-cog fa fa-spin white'></i> Processing");
          var id = btn.attr("data-id");
          var box_id = $("#box"+id+"");
          $.post('save.php',
          {
            subscription:id
          }
          ,function(data){
            data_result.html(data);
            box_id.hide();
          });
        });
      });
    </script>
    <?php 
        require_once("../assets/incs/scripts-bottom.php");
    ?>  
</body>
</html>