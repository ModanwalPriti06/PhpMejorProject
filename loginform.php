<?php
if(isset($_POST['loginbtn']))
{
	$email=$_POST['eid'];
	$pass=$_POST['pass'];
	$con=mysqli_connect("localhost","root","","majorproject");
	$query="select * from registration where email='$email' and password='$pass'";
	//echo $query;
	$data=mysqli_query($con,$query);
	 $cr= mysqli_num_rows($data);
	 $row=mysqli_fetch_array($data);//echo $res;
	if($cr>0)
	{
		session_start();
		$_SESSION['name']=$row[0];
		$_SESSION['eid']=$row[4];
		$_SESSION['file']=$row[2];
		$_SESSION['pass']=$row[5];
		$_SESSION['dob']=$row[1];
		$_SESSION['gender']=$row[3];
		$_SESSION['college']=$row[6];
		echo "<script>window.location.href='dashboard.php';</script>";      //12+18     
		//echo $row[4];
	}
	else{
		echo "wrong data";
	}
}
?>
<html>
<head>
<link href="css/bootstrap.css" rel="stylesheet" text="type/css"/>
<script src="js/bootstrap.js" rel="stylesheet" text="type/javascript"></script>
<link href="css/font.css" rel="stylesheet"/>
<style>
#topheader{
	min-height:60px;
	backgruond-color:teal;
	border-top:4px solid black;
	box-shadow:0px 3px 2px grey;

}
#header2{

	padding:3px;
	text-align:center;
}
</style></head>
<body>
<div class="container-fluid">
<div class="row bg-dark" id="topheader">
<div class="col-sm-2 p-2">
<a href="index.php">
<img src="ProfilePic/camlogo.jpg" style="height:65px; width:70;border-radius:50%;"></a></div>
<div class="col-sm-8"></div>
<div class="col-sm-2 p-3"><a href="loginform.php" style="text-decoration:white;width:100%;">
<button type="button" class="btn btn-outline-light"> <span style="text-align:right;">Sign In</span></button></a>
&nbsp;&nbsp;
<a href="logout.php" style="text-decoration:white;width:100%;">
<button type="button" class="btn btn-outline-light"> Sign Out</button></a>
&nbsp;

</div>


</div>

<div class="container"><center><h3><b><br/>LOGIN FORM</b></h3></center>
<div class="row">
<div class="col-sm-4"></div>
<div class="col-sm-4" style="min-height:50;background:url('backgr.jfif');padding:2px; border:
 5px solid black;box-shadow: 0 0 5px black inset; color:white; margin-top:2%;margin-bottom:12%;">
<div class="col-sm-12 " style="font-size:25px; color:white; text-align:center; font-weight:bold;">Login Here</br><hr/>
 </div>
 <form action="" method="post">
<b>Email:</b></br><input type="email" name="eid" class="form-control" required placeholder="Enter your email" />
<b>Password:</b><input type="password" name="pass" class="form-control" required placeholder="Enter your password"/></br>
<input type="submit" name="loginbtn" class="form-control btn btn-info" value="Login Now"/>
<a href="register.php" style="text-decoration:none;color:white;">New User? Register now</a></form>
</div>
</div>
</div>
<!--footer-->
<?php include('userfooter.php')?>
</body>
</html>