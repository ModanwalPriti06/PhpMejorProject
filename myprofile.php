<?php
session_start();
if(isset($_SESSION['name']))
{
		
}
else{
	 echo "<script>alert('plzzzzz login');window.location.href='loginform.php';</script>";
}?>
<?php
if(isset($_POST['sub'])){
	$name=$_POST['name'];
	$dob=$_POST['dob'];
	$gen=$_POST['gen'];
	$user=$_SESSION['eid'];
	$college=$_POST['college'];
	$photo=$_FILES['pic']['name'];
	$con=mysqli_connect('localhost','root','','miniproject');
	if($photo=='null'){
	$query="update registration set name='$name',dob='$dob',gender='$gen',college='$college' where email='$user'";
	}else{
	//$con=mysqli_connect(localhost,'root','','miniproject');
	$query="update registration set name='$name',dob='$dob',gender='$gen',file='$photo',college='$college' 
	where email='$user'";
	$phototmpfile=$_FILES['pic']['tmp_name'];
	move_uploaded_file($phototmpfile,"ProfilePic/$photo");
	}
	$res=mysqli_query($con,$query);
		$_SESSION['name']=$name;
		$_SESSION['dob']=$dob;
		$_SESSION['gender']=$gen;
		$_SESSION['file']=$photo;
}
?>
<html>
<head>
<link href="css/bootstrap.css" rel="stylesheet" text="type/css"/>
<script src="js/jquery.js" rel="stylesheet"></script>
<script src="js/bootstrap.js" rel="stylesheet" text="type/javascript"></script>
<link href="css/font.css" rel="stylesheet"/>
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
</head>
<body>
<div class="container-fluid">
<?php include('userheader.php');?>
<div class="row">
<div class="col-sm-12" style="text-align:center;font-size:20px">MyProfile</div>
<div class="container">
<div class="row">
<div class="col-sm-2" style="margin-top:5%;"><img src="profilepic/<?php echo $_SESSION['file'];?>" 
style="height:100px;width:100px;"></div>
<div class="col-sm-10">

<form action="" method="POST" enctype="multipart/form-data">
<div class="row">
		<div class="col-sm-6">Name:<input type="text" name="name" value="<?php echo $_SESSION['name']?>" class="form-control"/></div>
		<div class="col-sm-6">DOB:<input type="date" name="dob" value="<?php echo $_SESSION['dob']?>" class="form-control"></div>
		</div> 
		<div class="row">
	 	<div class="col-sm-6"></br><b>Gender:</b>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="radio" name="gen" value="male" <?php if($_SESSION['gender']=="male"){echo "checked";}?>/> male
		<input type="radio" name="gen" value="Female" <?php if($_SESSION['gender']=="Female"){echo "checked";}?>/>Female</div>
<div class="col-sm-6">
College Name:

<select class="form-control" name="college">
		<option <?php if($_SESSION['college']=="GGP Amethi"){echo "selected";}?>>GGP Amethi</option>
		<option <?php if($_SESSION['college']=="GGP Lucknow"){echo "selected";}?>>GGP Lucknow</option>
		<option <?php if($_SESSION['college']=="KNIT btech college"){echo "selected";}?>>KNIT btech college</option>
	<option <?php if($_SESSION['college']=="HEwat polytechnic college"){echo "selected";}?>>HEwat polytechnic college</option>
	</select></div>
</div>
<div class="row">
<div class="col-sm-6">UPload Photo:<input type="file" name="pic" value="<?php echo $_SESSION['file']?>" 
class="form-control"/></div>
<div class="col-sm-6"></br><input type="submit" name="sub" class="form-control btn btn-info" 
		value="Update Now"/></div>
		</div>
</form>		
</div>
</div>
</div>
</div>
<!--FOOTER-->
<?php include('userfooter.php');?>
</body>
</html>