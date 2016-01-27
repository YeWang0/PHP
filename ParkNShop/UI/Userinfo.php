<?php
	require_once ("head.php");
?>
<?php
	echo "<div align='center'>";
	echo "<h2>Profile:</h2>";
 $conn = mysqli_connect('localhost', 'root', '123','parknshop');
 if (!$conn) {
 	die("Connection failed: " . mysqli_connect_error());
 }
 if (isset ( $_SESSION ['username'] )) {
	 $sql = "SELECT * FROM `users`where name='".$_SESSION ['username']."'";
// 	 echo $sql;
	 $result = mysqli_query($conn, $sql);
	 echo "<table border='1' style='border-collapse: collapse;'>";
	 echo "	<tr>
				<td>Name</td>
				<td>Password</td>
	 			<td>E-mail</td>
			</tr>
			";
	 
	 // output data of each row
	 $row = mysqli_fetch_assoc($result) ;
	 	echo "	<tr>
						<td>".$row['name']."</td>
						<td>".$row['password']."</td>
						<td>".$row['email']."</td>
					</tr>
					";
	 
 }else{
 	echo "Log in first!";
 }
 echo "</div>";