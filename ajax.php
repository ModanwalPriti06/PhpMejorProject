<html>
<head>
	 <link href="css/bootstrap.css" rel="stylesheet" text="type/css"/>
	<script src="js/jquery.js" rel="stylesheet"></script>
	<script src="js/bootstrap.js" rel="stylesheet" text="type/javascript"></script>
	<link href="css/font.css" rel="stylesheet"/>
	<script>
	function savedata(){
		var name=$("#name").val();
		var mobno=$("#mob").val();
		$.ajax({
			url:'demo.php',
			type:'POST',
			data:{n:name,m:mobno},
			success:function(r){
				//$("#name").val(null);
				alert(r);
			}	
		});
		}
	</script>
</head>
	<body>
		 <h3>Sava data using Ajxa</h3>
		 <input type="text" placeholder="enter your name" id="name">
		 <br/>
		 <br/>
		 <input type="number" placeholder="Enter your number" id="mob">
		 <br/>
		 <br/>
		 <input type="button" value="Save Data" id="btn" onclick="savedata()">
	</body>
</html>
