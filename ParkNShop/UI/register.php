<?php
	require_once ("head.php");
?>
<html>
<head>
<title>
	hello
</title>

<script type="text/javascript">
	var re='';	
	
	function check() {
		re=getXmlHttpObject();
		if (re) {
			var url="../OP/CheckInput.php";
// 			alert(url);
			var data="username="+document.getElementById("n1").value+"&op=register";
// 			alert(data);
			re.open("POST", url, true);
			
			re.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			re.send(data);
			re.onreadystatechange=operat;
			
		} else {
			window.alert('n');
		}
	}
	
	function operat() {
		if (re.readyState==4){
			document.getElementById("hide").value=
				re.responseText;
		}
	}
	
	function getXmlHttpObject(){
		var xmlHttpRequest;
		xmlHttpRequest=new XMLHttpRequest();
		
		return xmlHttpRequest;
	}
</script>





</head>
<body>
<div align='center'>
	<h1>Register</h1>
	<form action="../OP/register_p.php" method="post"></br>
	Nickname:&nbsp;
	<input type="text" name="name" style="width:130px;" id="n1" onkeyup="check()">
	</br>
	<input type="text" style="color:red;background: transparent;border:none;" size="7" id="hide">
	</br>
	Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="email" name="email" style="width:130px;"  ><br><br>
	Password:&nbsp;&nbsp;
	<input type="password" name="password" style="width:130px;"  ><br><br>
	Submit:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<button type="submit"  style="background: url(../icon/sign-up-button.jpg);color:blue;height:30px;width:130px;background-size:cover;align:center; " >
	</button><br>
	</form>
	</div>
</div>
</body>








</html>