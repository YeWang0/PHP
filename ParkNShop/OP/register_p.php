<?php
$name=$_POST['name'];
$email=$_POST['email'];
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
			header("Location: ../UI/login.php?error=user_exist");
			mysqli_close($conn);
			exit;
		}
	}
}
$sql=" INSERT INTO `users`(`name`,`password`,`email`) VALUES ('".$name."','".$password."','".$email."')";
// echo $sql;
if (mysqli_query($conn, $sql)) {
	$url='Location: ../UI/Main.php?name='.$name;
	session_start();
	// store session data
	$_SESSION['username']=$name;
	header($url);
	mysqli_close($conn);
	exit;
}else{
	header("Location: ../UI/register.php?error=sqlerror");
	mysqli_close($conn);
	exit;
}








// if ($name=='evan'){
// 	header("Location: login.php?error=2");
// 	exit;
// }else {
// 	$url='Location: Main.php?name='.$name;
// 	header($url);
// 	exit;
// }
?>