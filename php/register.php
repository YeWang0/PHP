
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
			var url="CheckInput.php";
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
	<h1>Register</h1>
	
	<form action="register_p.php" method="post">
	Nickname:&nbsp;
	<input type="text" name="name" style="width:130px;" id="n1" onkeyup="check()">
	<!--
	<input type="button" onclick="check()" value="click">
	-->
	<input type="text" style="border:none;color:red" size="7" id="hide">
	<br>
	Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="email" name="email" style="width:130px;"  ><br>
	Password:&nbsp;&nbsp;
	<input type="password" name="password" style="width:130px;"  ><br>
	Submit:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit"  style="color:red;width:130px;background:pink" value="register"><br>
	</form>

</body>








</html>