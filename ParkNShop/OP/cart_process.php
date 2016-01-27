<?php
	$item_id=$_GET['item_id'];
$conn = mysqli_connect ( 'localhost', 'root', '123', 'parknshop' );
if (! $conn) {
	die ( "Connection failed: " . mysqli_connect_error () );
}

$sql = "DELETE FROM `cart` WHERE `item_id`='" . $item_id . "'";

if (mysqli_query ( $conn, $sql )) {
	header ( "Location: ../UI/Cart.php?Success" );
	mysqli_close($conn);
	exit ();
} else {
	header ( "Location: ../UI/Cart.php?Fail" );
	mysqli_close($conn);
	exit ();
}