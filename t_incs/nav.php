
<nav class="navbar navbar-expand-lg navbar-light">
  <!-- Brand -->
  	<a class="navbar-brand" href="<?php echo $dir; ?>"><img src="<?php echo $dir;?>assets/files/images/logo.png"></a>
	<button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse" data-target="#navb" aria-expanded="false">
    	<span class="navbar-toggler-icon"></span>
  	</button>
	  <div class="navbar-collapse collapse" id="navb">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $dir;?>dashboard/">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $dir;?>course-create/">Create Course</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a class="btn btn-outline-success my-2 my-sm-0" href="<?php echo $dir;?>logout/">Log Out</a>
    </form>
  </div>
</nav> 
