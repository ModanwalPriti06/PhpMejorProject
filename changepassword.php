<?php
session_start();
if(isset($_SESSION['name']))
{
		
}
else{
	 echo "<script>alert('plzzzzz login');window.location.href='loginform.php';</script>";
}?>

<html>
<head>
<link href="css/bootstrap.css" rel="stylesheet" text="type/css"/>
<script src="js/jquery.js" rel="stylesheet"></script>
<script src="js/bootstrap.js" rel="stylesheet" text="type/javascript"></script>
<link href="css/font.css" rel="stylesheet"/></head>
<style>
#topheader{
	min-height:60px;
	backgruond-color:teal;
	border-top:4px solid black;
	box-shadow:0px 3px 2px grey;
	padding-top:10px;	
}
#header2{
	background:black;
	padding:3px;
	text-align:center;
}
 a{

	margin-left:35px;
}
li{
	margin-top:10px;
}

</style>
<body>
<div class="container-fluid">
<?php include('userheader.php');?>
<div class="row">
<div class="container"><center><h3><b>Change your password here</b></h3></center>
<div class="row">
<div class="col-sm-4"></div>
<div class="col-sm-4" style="min-height:50;background:url('backgr.jfif');padding:2px; border:
 5px solid black;box-shadow: 0 0 5px black inset; color:white; margin-top:2%;margin-bottom:5%;">
<div class="col-sm-12 " style="font-size:25px; color:white; text-align:center; font-weight:bold;">
Change Password</br><hr/>
 </div>
 <form action="changepasswordcode.php" method="post">
<b>old password</b></br><input type="password" name="opass" class="form-control" required 
placeholder="Enter your old password"/>
<b>New Password:</b><input type="password" name="npass" class="form-control" required 
placeholder="enter your new password" />
<b>Re-password</b></br><input type="password" name="rpass" class="form-control" required 
placeholder="re-enter your password"/></br>
<input type="submit" name="sub" class="form-control btn btn-info" value="Change Password"/>
</div>
</div>
</div>
</div>
<?php include('userfooter.php');?>
</body>
</html>