
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
			var data="username="+document.getElementById("n1").value+"&op=login";
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
	function result() {
// 		alert(document.URL);
		var result=document.URL.split('?');
		if (result.length==2){
			alert('Fail to login!');
		}
	}
// 	window.onload=result;
</script>

</head>
<body>
	<h1>Login</h1>
	<form action="login_p.php" method="post">
	Nickname:&nbsp;
	<input type="text"  name="name" style="width:130px;" id="n1" onkeyup="check()">
	<!--
	<input type="button" onclick="check()" value="click">
	-->
	<input type="text" style="border:none;color:red" size="7" id="hide">
	<br>
	Password:&nbsp;&nbsp;
	<input type="password" name="password" style="width:130px;"  ><br>
	Submit:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit"  style="color:blue;width:130px;" value="login">
	<a href="register.php" style="color:red;width:60px;background:pink">Go register!</a>
	<br>
	</form>
<?php
	if (!empty($_GET['error'])){
		$error=$_GET['error'];
		if($error==1){
			echo("</br></br><h3>Fail to login!</h3>");
			echo('&nbsp&nbsp&nbsp&nbsp&nbsp'.'error code: '.$error);
		}
		else if ($error==2) {
			echo("</br></br><h3>Username already exist!</h3>");
			echo('&nbsp&nbsp&nbsp&nbsp&nbsp'.'error code: '.$error);
		}
	}
	

?>
</body>



</html>