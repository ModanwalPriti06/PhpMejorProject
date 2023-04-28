<?php
$name=$_POST['n'];
$mob= $_POST['m'];
echo $name.$mob;
include('connection.php');
	$query="insert into registration(name) values ('$name')";
	$res=mysqli_query($con,$query);
	echo $res;
	echo "successfully";
?>