<?php
$connect=new PDP('mysql:host=localhost;dbname=testing','root','');
$error='';
$comment_name='';
$comment_content='';
if(empty($_POST['comment_name'])){
	$error .='<p class="text-danger">Nmae ig required</p>;
}
else{
	$comment_name=$_POST["comment_name"];
}
if(empty($_POST["comment_content"])){
	$error .='<p class="text-danger">Comment is required</p>';
}
else{
	#comment_content= $_POST["comment_content"]
}
if($error == '')
		 $query='Insert into tab_paymment ()values'
	 

?>