<?php
session_start();
if(isset($_SESSION['name']))
{
		
}
else{
	 echo "<script>alert('please login');window.location.href='loginform.php';</script>";
}
?>
<script>
function like(id,e){
	e.setAttribute("class","fa fa-heart");
	var uid='<?php echo $_SESSION['eid'] ?>';
	e.innerHTML="<sup>"+parseInt(e.innerText)+1+"</sup>";
	$.ajax({
		 url:'like.php',
		 type:'POST',
		 data:{did:id,email:uid}, // here uid id variable and second uid is the session eid store vriable
		 success:function(r){
			 alert(r);
		 } 
	});
	
	
	//alert(uid);
}
function getDocId(id){
	 document.getElementById("doc_id").value=id;
	 $.ajax({
		 url:'getuserdetail.php',
		 type:'POST',
		 data:{did:id},
		 success:function(r){
			 //alert(r);
			 document.getElementById("commentsection").innerHTML=r;
		 }
	 });
	
}
function savecomment(){
	var doc_id=document.getElementById("doc_id").value;
	var msg=document.getElementById("msg").value;
	var uid='<?php echo $_SESSION['eid'] ?>';
	//alert(doc_id+" "+msg+" "+uid);
	$.ajax({
		 url:'comment1.php',
		 type:'POST',
		 data:{did:doc_id,msg:msg,uid:uid}, // here uid id variable and second uid is the session eid store vriable
		 success:function(r){
			 document.getElementById("msg").value=" ";
			  document.getElementById("close").click();
			 alert(r);
		 } 
	});
	
}
</script>
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
<!--Start Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
 aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Comment section</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="commentsection" style="overflow-y:scroll;height:300px;"></div>
        <div class="modal-footer">
	    <input type="hidden" id="doc_id">
	    <textarea id="msg" placeholder="Write your comment here..........." style="width:100%;" rows="2px"></textarea>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close">Close</button>
        <button type="button" class="btn btn-primary" onclick="savecomment()">post comment</button>
      </div>
    </div>
  </div>
</div>

<!--end modal-->
<body>
<div class="container-fluid">
<?php include('userheader.php')?>
<div class="row">
<div class="col-sm-12" style="text-align:center;"><h3>WELCOME TO MY <span style="color:skyblue;">
<i>ENGG HUB</i></span></h3></div>
<?php
$con=mysqli_connect("localhost","root","","majorproject");

	$data=mysqli_query($con,"SELECT registration.*,studydocument.* 
	from registration,studydocument where registration.email=studydocument.userid order by
	studydocument.id desc;");
	$user=$_SESSION['eid'];
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
<div class="col-sm-4">
<span class="normaltext" style=""><b>File type is: </b><?php echo $row['doctype'];?><br/><span><b>click here to Download</b> 
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
<span class="fa fa-heart-o" onclick="like(<?php echo $row['id'];?>,this)" style="color:black;size:28px;">
  <sup style="font-size:13px;"><?php echo $num3 ?></sup></span><?php }?>
	 <a href="#" onclick="getDocId(<?php echo $row['id'] ?>)" style="font-size:18px;text-decoration:none;color:blue;"
	 data-toggle="modal" data-target="#exampleModal"><?php echo $num4 ?> Comment</a>
  
</div>
<div class="col-sm-2"><img src="ProfilePic/<?php echo $_SESSION['file'];?>" 
height="65px"width="85px" style="border-radius:20%;"></div>
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
<!--footer-->
<?php include('userfooter.php')?>
</body>
</html>