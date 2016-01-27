<?php
session_start ();
if (isset ( $_SESSION ['username'] )) {
	echo "Hello! " . $_SESSION ['username'];
} else {
	$_SESSION ['username'] = $_POST ['name'];
	echo "Hello! " . $_SESSION ['username'];
}

$id = $_GET ['id'];
$OP = $_GET ['OP'];
// echo $OP;
// //get info from sql
$conn = mysqli_connect ( 'localhost', 'root', '123', 'parknshop' );
if (! $conn) {
	die ( "Connection failed: " . mysqli_connect_error () );
}

if ($OP == 'delete') {
	$sql = "DELETE FROM `shopping_list` WHERE `id`='" . $id . "'";
	
	if (mysqli_query ( $conn, $sql )) {
		header ( "Location: ../UI/Main.php?Success" );
		mysqli_close($conn);
		exit ();
	} else {
		header ( "Location: ../UI/Main.php?Fail" );
		mysqli_close($conn);
		exit ();
	}
}
if ($OP == 'cart') {
	$sql =" INSERT INTO `cart`(`username`, `item_id`) VALUES('".$_SESSION['username']."','".$id."')";
// 	echo $sql;
	if (mysqli_query ( $conn, $sql )) {
		header ( "Location: ../UI/Cart.php?Success" );
		mysqli_close($conn);
		exit ();
	} else {
		header ( "Location: ../UI/Cart.php?Fail" );
		mysqli_close($conn);
		exit ();
	}
}

