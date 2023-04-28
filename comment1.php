<?php 
$did=$_POST['did'];
$msg=$_POST['msg'];
$uid=$_POST['uid'];
include('connection.php');
$query="insert into comment(uid,did,msg,cdate)values('$uid','$did','$msg',curdate())";
mysqli_query($con,$query);
echo "thanku your comment is important to us";
?>