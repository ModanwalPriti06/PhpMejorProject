 <?php
if(isset($_POST['sub'])){
	echo $name=$_POST['name'];
	echo $date=$_POST['dob'];
	$Gen=$_POST['gen'];
	$email=$_POST['email'];
	echo $pass=$_POST['pass'];
	$class=$_POST['class'];
	//Value print
	/*echo $name."</br>";
	echo $date."</br>";
	echo $Gen."</br>";
	echo $email."</br>";
	echo $pass."</br>";
	echo $class."</br>";*/
	//profilr photo
	$picname=$_FILES['pic']['name'];
	$pictem=$_FILES['pic']['tmp_name'];
	$pictype=$_FILES['pic']['type'];
	$picsize=$_FILES['pic']['size'];
	//echo $picname."</br>dynamic file".$pictem." ".$pictype."< >".$picsize;
	move_uploaded_file($pictem,"ProfilePic/$picname");
	//MYSQL connectivity
	$con=mysqli_connect("localhost","root","","majorproject");
	$res=mysqli_query($con,"insert into registration(name,dob,file,gender,email,password,college,regdate)
	values('$name','$date','$picname','$Gen','$email','$pass','$class',curdate())");
	echo $res;
	//$query="insert into registration(name,dob,file,gender,email,password,college,regdate)
	//values('$name','$date','$picname','$Gen','$email','$pass','$class',curdate())";
	//echo $query;
}
?>
<html>
<head>
<link href="css/bootstrap.css" rel="stylesheet" text="type/css"/>
<script src="js/bootstrap.js" rel="stylesheet" text="type/javascript"></script>
<style>
#outer{
	background:url('backgr.jfif');
	background-size:100% 100%;
	min-height:700px;	
}
#inner{
	min-height:700px;
	background:rgba(255,255,255,0.3);
}
</style>	 
</head>
<body>
		<div class="container-fluid" id="outer">
		<div class="row"id="inner" style="color:white; font-weight:bold;">
		<div class="col-sm-12">
		<div class="container-fluid m-5" style="text-align:center; padding:10px; color:white">
		<h1>Registration Form:</h1></div>
		<div class="container-fluid m-5">
		</div><form action="" method="post" enctype="multipart/form-data">
		<div class="row">
		<div class="col-sm-6">Name:<input type="text" name="name" class="form-control" placeholder="Enter your name"/></div>
		<div class="col-sm-6">DOB:<input type="date"/ name="dob" class="form-control" placeholder="Enter your dob"></div>
	
		</div> 
		<div class="row">
		<div class="col-sm-6">File:<input type="file" name="pic" class="form-control"/></div>
	 	<div class="col-sm-6"></br><b>Gender:</b>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"
		name="gen" value="male"/>male
		<input type="radio" name="gen" value="Female"/>Female</div>
		</div>
		<div class="row">
		<div class="col-sm-6">Password:<input type="password" name="pass" class="form-control" placeholder="Enter your Password"/></div>
        <div class="col-sm-6">Class:<select class="form-control" name="class">
		<option>choose your college</option>
		<option>GGP Amethi</option>
		<option>GGP Lucknow</option>
		<option>KNIT btech college</option>
		<option>GGPa Lucknow</option>
		<option>IIt College varanshi</option>
		<option>HEwat polytechnic college</option>
		</select></div>
		</div></br>
		<div class="row">
		<div class="col-sm-6">Email:<input type="email" name="email" class="form-control" placeholder="Enter your Email"/></div>
		
		<div class="col-sm-6"></br><input type="submit" name="sub" class="form-control btn btn-info" 
		value="Register Now"/></div>
		<div class="col-sm-12"></br>
		<a href="loginform.php"><input type="button" value="Already register ? Login now" class="form-control btn btn-info" 
		name="sub"></a>
		</div>
		
		</form>
		</div>		
		</div>		
</body>		 
</html>