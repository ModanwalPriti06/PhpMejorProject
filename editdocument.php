<?php
$id=$_REQUEST['id1'];
	include('connection.php');
	$query="select * from studydocument where id=$id";
	$data=mysqli_query($con,$query);
	//$cr= mysqli_num_rows($data);
	$res=mysqli_fetch_array($data);
	$title=$res[1];
	$des=$res[3];
	$course=$res[2];
    $tag=$res[4];
	$thumb=$res[6];
	$doc=$res[7];
?>
<?php
if(isset($_POST['sub']))
{
	$title1=$_POST['title'];
	$des1=$_POST['description'];
	$course1=$_POST['course'];
	$tag1=$_POST['tag'];
	$thumbname=$_FILES['thumbnail']['name'];
	$thumb_tmp=$_FILES['thumbnail']['tmp_name'];
	include('connection.php');
	$query1="update studydocument set title='$title1',course='$course1',description='$des1',tag='$tag1' where id='$id'";
	$res1=mysqli_query($con,$query1);
	if($res1){
		echo "<script>window.location.href='uploaddocument.php'</script>";
		move_uploaded_file($thumb_tem,"ProfilePic/$thumbname");
	}
}	
?>
<?php
session_start();
if(isset($_SESSION['name']))
{
	
}
else{
	 echo "<script>alert('please login');window.location.href='loginform.php';</script>";
}
?>
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
<div class="container-fluid" style="min-height:500px;">
<form action="" method="Post" enctype="multipart/form-data">
<div class="row">
<div class="col-sm-12" style="margin-top:2%;padding:1%;min-height:300px;font-size:15px;font-family:Times New Roman;background
:#475993;box-shadow:1px 1px 2px teal;">
<div class="row">
<div class="col-sm-6">
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fa fa-pencil"></i></span>
  </div>
  <input type="text" class="form-control" name="title"
  placeholder="Title of Document" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $title?>">
</div>
</div>
<div class="col-sm-6">
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fa fa-book"></i></span>
  </div>
  <input type="text" class="form-control" name="course"
  placeholder="For which course student branch" aria-label="Username" aria-describedby="basic-addon1"
  value="<?php echo $course?>">
</div>
</div>
<div class="col-sm-6">
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fa fa-pencil"></i></span>
  </div>
  <textarea class="form-control" placeholder="Description/Definiton about the title object"
 rows="3" name="description" aria-label="Username" 
  aria-describedby="basic-addon1"><?php echo $des?>
  </textarea>
</div>
</div>
<div class="col-sm-6">
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fa fa-pencil"></i></span>
  </div>
  <textarea class="form-control" placeholder="tag for searching" rows="3" name="tag" 
  aria-label="Username" aria-describedby="basic-addon1"><?php echo $tag?>
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
Thumbnail Of Document<input type="file" name="thumbnail" value="<?php echo $thumb;?>"/>
</div>

<div class="col-sm-6" style="font-size:17px;color:white;"></br>
Selelct your Document File<input type="file" name="document" value="<?php echo $doc;?>"/>
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