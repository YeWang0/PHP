<?php
	$id=$_POST['id'];
	$name=$_POST['name'];
	$price=$_POST['price'];
	$date=$_POST['date'];
	$info=$_POST['info'];
	
	$conn = mysqli_connect('localhost', 'root', '123','parknshop');
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "SELECT `id` FROM `shopping_list`";
	
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			if ( $row["id"]==$id ){
				header("Location: Main.php?error=item_exist");
				exit;
			}
		}
	}
	$sql=" INSERT INTO `shopping_list`(`id`, `name`, `price`, `date`, `info`) VALUES ('".$id."','".$name."','".$price."','".$date."','".$info."')";
// 	echo $sql;
	if (mysqli_query($conn, $sql)) {
		$url='Location: Main.php';
		header($url);
		exit;
	}else{
		header("Location: Main.php?error=sqlerror");
		exit;
	}
	
