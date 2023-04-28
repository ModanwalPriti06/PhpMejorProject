<?php
$opass=$_POST['opass'];
$npass=$_POST['npass'];
$rpass=$_POST['rpass'];
session_start();
$password=$_SESSION['pass'];
echo $password;
$user=$_SESSION['eid'];
if($password==$opass){
	if($npass==$rpass){
		$con=mysqli_connect('localhost','root','','miniproject');
		$query="update registration set password='$npass' where email='$user'";
		$res=mysqli_query($con,$query);
		if( $res){
			echo "<script>alert('password change');window.location.href='logout.php';</script>";
		}
		
	}
	else{
		echo "<script>alert('new and confirm passworddont match');</script>";
	}
}
else{
	echo "<script>alert('your current is not invalid');</script>";
}
?>