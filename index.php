<?php
session_start();?>
<html>
<head>
<link href="css/bootstrap.css" rel="stylesheet" text="type/css"/>
<script src="js/bootstrap.js" rel="stylesheet" text="type/javascript"></script>
<link href="css/font.css" rel="stylesheet"/>
<link href="css/font.css" rel="stylesheet"/>
<style>
#topheader{
	min-height:60px;
	backgruond-color:teal;
	border-top:4px solid black;
	box-shadow:0px 3px 2px grey;
	
}
</style>
<script>
function message(){
	alert('you can not perform any task without login');
	window.location.href='loginform.php';
}
function searching(){
	var searchtxt=document.getElementById("searchtxt").value;
	if(searchtxt==""){
		alert('Please type of some text to search document');
	}
	else{
		window.location.href="index.php?val="+searchtxt;
	}
}
</script>
<style>
#header1{
	background:teal;
	
	min-height:10px;
	font-size:20px;
	color:white;
	font-weight:bold;
	text-align:center;
}
#header2{
	
	padding:3px;
	text-align:center;
}
 a{

	margin-left:35px;
}
li{
	margin-top:10px;
}
#dynamicrow{
	min-height:200px;
	background:#d9d8d8;
	max-height:30px;
	padding:2%;
	box-shadow:1px 2px 2px black;
}
.heading{
	font-size:16px;
	font-family:'Times New Roman';
	color:black;
}
.normaltext{
font-size:15px;
font-family:'Monotype corsiva';
color:black;
}
.border{
	border:20px solid black;
	padding:1%;
}
</style>
</head>
<body>
<div class="container-fluid">
<div class="row bg-dark" id="topheader">
<div class="col-sm-1 p-2">
<a href="index.php">
<img src="ProfilePic/camlogo.jpg" style="height:70px; width:70;border-radius:50%;"></a></div>
<div class="col-sm-5 p-3"><a href="loginform.php" style="text-decoration:white;width:100%;">
<button type="button" class="btn btn-outline-light"> Sign In</button></a>
&nbsp;&nbsp;
<a href="logout.php" style="text-decoration:white;width:100%;">
<button type="button" class="btn btn-outline-light"> Sign Out</button></a>
&nbsp;

</div>

<div class="col-sm-6 p-3">
<div class="input-group mb-3">
  <input type="text" id="searchtxt"class="form-control" placeholder="Search Here..." aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button class="btn btn-primary" type="button" onclick="searching()">Search Nows</button>
  </div>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12" style="text-align:center;"><h3>WELCOME TO MY <span style="color:skyblue;">
<i>ENGG HUB</i></span></h3></div>
<?php
$con=mysqli_connect("localhost","root","","majorproject");
if(isset($_REQUEST['val'])){
	$txt=$_REQUEST['val'];
	$data=mysqli_query($con,"SELECT registration.*,studydocument.* 
	from registration,studydocument where registration.email=studydocument.userid 
	and studydocument.tag like '%$txt%' order by
studydocument.id desc;");
}
else{
	$data=mysqli_query($con,"SELECT registration.*,studydocument.* 
	from registration,studydocument where registration.email=studydocument.userid  order by
studydocument.id desc;");
}
	$user="";
	while($row=mysqli_fetch_array($data))//ek ek row ko ek ek bar fetch krega
	//row=1 name first dob-1998-10-07 then 2 name 2 dob,
		{	
			$did=$row['id'];
			$query2="select * from liked where uid='$user' and doc_id='$did'";
			$data2=mysqli_query($con,$query2);
			$num2=mysqli_num_rows($data2);
			//echo $num2;
		 $query3="select * from liked where doc_id=$did";
		$data3=mysqli_query($con,$query3);
		$num3=mysqli_num_rows($data3);
		//echo $num3;
		$query4="select * from comment where did=$did";
		$data4=mysqli_query($con,$query4);
		$num4=mysqli_num_rows($data4);
		
		?>
<div class="col-sm-6">
<div class="col-sm-12" id="dynamicrow">
<div class="row">
<div class="col-sm-2"><img src="ProfilePic/<?php echo $row['thumbnail'];?>" class="border" 
height="100px"width="100px"></div>
<div class="col-sm-10"><span class="heading"><?php echo $row['title'];?></span><br/>
<span class="normaltext" style="color:blue;"><b>Specielly Design For:</b><?php echo $row['course'];?></span><br/>
<span class="heading" style="color:black;"><b>Description:</b><?php echo $row['description'];?></span>
</div></div>
<div class="row">
<div class="col-sm-5">
<span class="normaltext" style=""><b>File type is: </b><?php echo $row['doctype'];?><br/><span>
<b>click here to Download</b> <a href="#" onclick="message()" >
<span class="fa fa-download" style="color:blue;"></span><br/></span></span>
<?php
  if($num2>0)
  {
  ?>
	 <span class="fa fa-heart" style="color:red;size:28px;">
	 <sup style="font-size:13px;" class="countlike"><?php echo $num3 ?></sup></span>
  <?php
  }
  else{
  ?>
<span class="fa fa-heart-o" onclick="message()" style="color:black;size:28px;">
  <sup style="font-size:13px;"><?php echo $num3 ?></sup></span><?php }?>
	 <a href="#" onclick="message()" style="font-size:18px;text-decoration:none;color:blue;"
	 data-toggle="modal" data-target="#exampleModal"><?php echo $num4 ?> Comment</a>
  
</div>

<div class="col-sm-6">

<span class="heading" style="font-size:14px;"><b>Uploaded By:</b><?php echo $row['name'];?>
<span class="normaltext">(<?php echo $row['course'];?> / computer science / 4rth sem)
</span></span><br/><span class="normaltext"><b>From:</b><?php echo $row['college'];?></span>
</div>
</div>
</div>
<br/>
</div>
		<?php 
		
		} ?>
</div>



<div class="row" style="min-height:50px;">
<div class="col-sm-5 bg-dark p-2" 
style="color:white;font-size:20px;text-align:left;font-family:cursive"><b>Developed by:</b>Summer
 training 2020 students</div>
<div class="col-sm-5 bg-dark p-2" style="color:white;font-size:20px;text-align:right;font-family:cursive"><b>Guided by:</b>Divya ray</div>
<div class="col-sm-2 bg-dark p-2" style="color:black;font-size:20px;text-align:center">
<button type="button" class="btn btn-primary fa fa-facebook rounded "></button>
<button type="button" class="btn btn-danger fa fa-Youtube rounded"></button>
<button type="button" class="btn btn-warning fa fa-instagram rounded"></button>
<button type="button" class="btn btn-light fa fa-linkedin rounded"></button>
</div>
</div>

</div>

</body>
</html>