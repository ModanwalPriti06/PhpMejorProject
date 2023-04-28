

<div class="container-fluid">
<div class="row bg-dark" id="topheader">
<div class="col-sm-2">
</div>
<div class="col-sm-7 h3 text-center"><span style="color:white">Welcome Back,<?php echo $_SESSION['name']?></span></div>
<div class="col-sm-3"><a href="loginform.php" style="text-decoration:white;width:100%;">
<button type="button" class="btn btn-outline-light"> <span style="text-align:right;">Sign In</span></button></a>
&nbsp;&nbsp;
<a href="logout.php" style="text-decoration:white;width:100%;">
<button type="button" class="btn btn-outline-light"> Sign Out</button></a>
&nbsp;

</div>


</div>














<div class="row" style="background:skyblue;padding:5px;min-height:30px; box-shadow:2px 2px 2px black;">
<div class="col-sm-2"><img src="ggpalogo.png" style="height:80px; width:80px; border-radius:50%;"></div>
<div class="col-sm-8">
<nav class="navbar navbar-expand-lg navbar-dark">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
  aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown" class="menu">
    <ul class="navbar-nav">
	 <li class="nav-item active">
        <a class="nav-link fa fa-tachometer" href="dashboard.php">&nbsp;Dashboard <span class="sr-only">(current)</span></a>
      </li>
	        <li class="nav-item active">
        <a class="nav-link fa fa-upload" href="alldocument.php">&nbsp;All document</a>
      </li>
	  
	  
      <li class="nav-item active">
        <a class="nav-link fa fa-upload" href="uploaddocument.php">&nbsp;Upload document</a>
      </li>
      <li class="nav-item">
        <a class="nav-link fa fa-sign-out" href="logout">&nbsp;Log out</a>
      </li>
     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle fa fa-cog" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          &nbsp;Setting
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="changepassword.php">Change pasword</a>
          <a class="dropdown-item" href="myprofile.php">My profile</a>
          <a class="dropdown-item" href="documentmgmt">Document Management</a>
         
        </div>
      </li>
    </ul>
  </div>
</nav>

</div>
<div class="col-sm-2"><img src="ProfilePic/<?php echo $_SESSION['file']?>"style
="height:80px; width:80px; border-radius:50%;"></div>
</div>