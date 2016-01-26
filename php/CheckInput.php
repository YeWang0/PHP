<?php
// 	echo $_SERVER['REQUEST_URI']
	$username=$_POST['username'];
	$op=$_POST['op'];
	$conn = mysqli_connect('localhost', 'root', '123','parknshop');
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "SELECT `name` FROM `users`";
	$v=1;
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			if ( $row["name"]==$username ){
				$v=0;
				if($op=='login'){
					echo "Valid";
					break;
				}else if ($op=='register') {
					echo "Invalid";
					break;
				}
			}
		}
	}
	if($v==1){
		if($op=='login'){
			echo "Invalid";
		}else if ($op=='register') {
			echo "Valid";
		}
	}

	mysqli_close($conn);
	
	
	
// 	if($username=="wangye"||$username=="evan"){
// 		echo "Valid";
// 	}else if($username!=""){
// 		echo "Invalid";
// 	}

?>