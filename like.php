<?php 
$did=$_POST['did'];
$email=$_POST['email'];
include('connection.php');
$query="insert into liked(uid,doc_id,like_date)values('$email','$did',curdate())";
mysqli_query($con,$query);
echo "thanku for your response";


 ?>