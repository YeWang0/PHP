
<?php
	session_start();
	if(!isset($_SESSION['username'])){ 
		$_SESSION=array();
		
		$username='Guest'; 
	}
	else if (isset($_SESSION['username'])){
		$username=$_SESSION['username'];
	}
?>

<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../css/background.css">
<title>ParkNShop</title>
<script type="text/javascript">
window.onload=function(){
	<?php echo "var username = '" .$username . "'"; ?>
// 	window.alert("hello");
if(username!='Guest'){
	document.getElementById('username').href="Userinfo.php";
}
document.getElementById('username').innerHTML=username;
}
</script>
</head>
<body>
<style type="text/css">

/* #head1 { display : inline;
	background:pink;	
 	color: #A00000;
 	float: center;
 	margin-left:10px;
 	margin-top:6px;
 	} */
#head1 {
 display : inline; 
text-align:center;
padding-top:5px;
margin-left:10px;}
#head2 { display : inline; float: right;margin-top:10px;margin-right: 10px;}
#div1 {
	text-align:center; 
	height: 50px;
	border: 2px;
	padding-top:10px;
	background:#F5F6CE;
	width:100%; 
}
#div2 {
	
	height: 30px;
	padding-top:10px;
	background:#F6CECE;
	width:100%; 
}
th {
	width:200px;
}
</style>
<div id="div1">
<a class="brand logo" href="#"> 
<img style="float: left;" src="http://book.zi5.me/wp-content/uploads/2014/07/logo____.png" alt="Logo" width="40px" height="40px">
</a>

<h1 id="head1">Welcome to ParkNShop online market!</h1>
<h2 id="head2">Hello!&nbsp;<a id="username" href="#">Guest</a></h2>
</div>
<div id="div2">
<table border="0">
  <tr>
    <th><a href='../UI/Main.php'>Home</th>
    <th><a href='../UI/login.php'>Login</th>
    <th><a href='../UI/register.php'>Register</th>
 	<th><a href='../UI/Cart.php'>Cart</th>
 	<th><a href='../UI/Userinfo.php'>Profile</th>
 	<th><a href='../OP/logout.php'>Logout</th>
  </tr>

</table>

</div>
</body>
</html>

