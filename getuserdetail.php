<?php
$did=$_POST['did'];
include('connection.php');
$query="select r.name,r.college,r.file,c.msg,c.cdate,c.cid from registration r,comment c where c.uid=r.email 
and c.did=$did order by c.cid desc";
$data=mysqli_query($con,$query);
$record="";
while($row=mysqli_fetch_array($data)){
	$record=$record."<div class='row'>
		<div class='col-sm-1'><img src='ProfilePic/$row[2]' height='45px' width='45'>
		 </div><div class='col-sm-1'></div>
		 <div class='col-sm-10'>
		 <span style='font-size:18px; color:#4a8af4;'>$row[0]</span><br/>
		 <span style='font-size:18px; color:#8000ef;'>$row[3]</span><br/>
		 <span style='font-size:18px; color:black;'>thanku gor commented</span><br/>
		 <span style='font-size:18px; color:#4a8af4;'>Commented on:$row[4]</span><br/>
		 </div>
         </div><hr/>";	  
}
echo $record;
?>