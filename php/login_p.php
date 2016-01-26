<?php
	$name=$_POST['name'];
	$password=$_POST['password'];
	//get info from sql
	$conn = mysqli_connect('localhost', 'root', '123','parknshop');
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "SELECT `name` FROM `users`";
	
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			if ( $row["name"]==$name ){
				$url='Location: Main.php?name='.$name;
				header($url);
				exit;
			}
		}
	}
	header("Location: login.php?error=1");
	exit;
	
	
	
// 	if ($name=='evan' && $password=='123'){
// 		$url='Location: Main.php?name='.$name;//+;
// 		echo $url;
// 		header($url);
// 		exit;
// 	}else {
// 		header("Location: login.php?error=1");
// 		echo 'fail to login';
// 		exit;
// 	}
	
	
	
	
	mysqli_close($conn);
?>