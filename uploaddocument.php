<?php
session_start();
if(isset($_SESSION['name']))
{
		
}
else{
	 echo "<script>alert('please login');window.location.href='loginform.php';</script>";
}?>
<?php
if(isset($_REQUEST['id']))
{
	$id=$_REQUEST['id'];
	include('connection.php');
	$query="delete from studydocument where id=$id";
	$res=mysqli_query($con,$query);
	if($res){
		echo "<script>alert('data deleted successfully');windows.location.href='uploaddocument.php';</script>";
		
	}
}	

?>
<?php
if(isset($_POST['sub']))
{
	$title=$_POST['title'];
	$course=$_POST['course'];
	$description=$_POST['description'];
	$tag=$_POST['tag'];
	$doctype=$_POST['doctype'];
	
	$thumb_fname=$_FILES['thumbnail']['name'];
	$thumb_tmp=$_FILES['thumbnail']['tmp_name'];
	
	$doc_fname=$_FILES['document']['name'];
	$doc_tmp=$_FILES['document']['tmp_name'];
	$userid=$_SESSION['eid'];
	
	$con=mysqli_connect("localhost","root","","majorproject");

	$res=mysqli_query($con,"insert into studydocument(title,course,description,tag,doctype,thumbnail,documentname,date,status,userid)
	values('$title','$course','$description','$tag','$doctype','$thumb_fname','$doc_fname',curdate(),'Publice','$userid')");
	echo $res;
	if($res)
	{
		move_uploaded_file($thumb_tmp,"ProfilePic/$thumb_fname");
		move_uploaded_file($doc_tmp,"ProfilePic/$doc_fname");
	   echo "<script>alert('your successfully');</script>";
	}
	
}
?>

<html>
<head>
<link href="css/bootstrap.css" rel="stylesheet" text="type/css"/>
<script src="js/jquery.js" rel="stylesheet"></script>
<script src="js/bootstrap.js" rel="stylesheet" text="type/javascript"></script>
<link href="css/font.css" rel="stylesheet"/></head>
<script>
function confirm_delete(){
	var v=confirm("DO you really delete this item");
	if(v==true){
		return true;
	}
	else
		return false;
}
</script>
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

<div class="container-fluid" style="min-height:500px;">
<form action="" method="Post" enctype="multipart/form-data">
<div class="row">
<div class="col-sm-12" style="margin-top:2%;padding:1%;min-height:300px;font-size:15px;font-family:Times New Roman;background
:url('backgr.jfif');box-shadow:1px 1px 2px teal;background-size:cover;">
<div class="row">

<div class="col-sm-6">
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fa fa-pencil"></i></span>
  </div>
  <input type="text" class="form-control" name="title"
  placeholder="Title of Document" aria-label="Username" aria-describedby="basic-addon1">
</div>
</div>
<div class="col-sm-6">
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fa fa-book"></i></span>
  </div>
  <input type="text" class="form-control" name="course"
  placeholder="For which course student branch" aria-label="Username" aria-describedby="basic-addon1">
</div>
</div>
<div class="col-sm-6">
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fa fa-pencil"></i></span>
  </div>
  <textarea class="form-control" placeholder="Description/Definiton about the title object" rows="3" name="description" aria-label="Username" 
  aria-describedby="basic-addon1">
  </textarea>
</div>
</div>
<div class="col-sm-6">
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fa fa-pencil"></i></span>
  </div>
  <textarea class="form-control" placeholder="tag for searching" rows="3" name="tag" 
  aria-label="Username" aria-describedby="basic-addon1">
  </textarea>
</div>
</div>
<div class="col-sm-6">
<select class="form-control" name="doctype">
<option>Jpeg</option>
<option>Jpg</option>
<option>Zip file</option>
<option>PDF</option>
<option>Mp3</option>
<option>Video/audio</option>
</select>
</div>
<div class="col-sm-6" style="font-size:17px;color:white;">
Thumbnail Of Document<input type="file" name="thumbnail"/>
</div>
<div class="col-sm-6" style="font-size:17px;color:white;"></br>
Selelct your Document File<input type="file" name="document"/>
</div>
<div class="col-sm-6"></br>
<input type="submit" name="sub" class="form-control btn btn-info" value="Publish name"/>
</div>
</div>
</div>
</form>
</div>
<div>
<div class="col-sm-12" style="text-align:center; font-weight:bold; font-size:20px;">MY Management of uploaded document</div>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Course</th>
      <th scope="col">Discription</th>
      <th scope="col">Tag</th>
      <th scope="col">Document type</th>
      <th scope="col">Thumbnail</th>
      <th scope="col">Uploaded Date</th>
      <th scope="col">Status</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include('connection.php');
	$user=$_SESSION['eid'];
	$query="SELECT * FROM `studydocument` WHERE userid='$user' ORDER BY id DESC";
	$data=mysqli_query($con,$query);
	$i=1;
	$numrow= mysqli_num_rows($data);
while($row=mysqli_fetch_array($data)){
		?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $row[1] ?></td>
<td><?php echo $row[2] ?></td>
<td><?php echo $row[3] ?></td>
<td><?php echo $row[4] ?></td>
<td><?php echo $row[5] ?></td>
<td><a href="ProfilePic/<?php $row[6] ?>"><i class="fa fa-download"></i></a></td>
<td><?php echo $row[7] ?></td>
<td><?php echo $row[8] ?></td>
<td><a href="editdocument.php?id1=<?php echo $row[0] ?>"><i class="fa fa-pencil" style="color:green;font-size:15px;"></i></a>
<a onclick=" return confirm_delete()"href="uploaddocument.php?id=<?php echo $row[0] ?>"><i class="fa fa-trash" style="color:red;font-size:15px;"></i>
</a></td>

</tr>
	
	<?php
	$i++;
	}
	?>
  </tbody>
</table>
</div>

<!--footer-->
<?php include('userfooter.php');?>
</body>
</html>