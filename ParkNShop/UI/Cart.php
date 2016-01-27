<?php
	require_once ("head.php");
?>
<?php
echo "<div align='center'>";
echo "<h2>Cart List:</h2>";
if (isset ( $_SESSION ['username'] )) {
	
//list info in cart

$conn = mysqli_connect('localhost', 'root', '123','parknshop');
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT item_id FROM `cart` where username='".$_SESSION ['username']."'";
$result = mysqli_query($conn, $sql);


echo "<table border='1' style='border-collapse: collapse;'>";
echo "	<tr>
			<td>Item ID</td>
			<td>Operation</td>
		</tr>
		";

	// output data of each row
	while($row = mysqli_fetch_assoc($result)) {
		echo "	<tr>
					<td>".$row['item_id']."</td>
					<td>
							<a href='../OP/cart_process.php?OP=delete&item_id=".$row['item_id']."' style='color:red;width:60px;'>Delete</a>
					</td>
				</tr>
				";
	}

echo "</table>";
}else{
	echo "Log in first!";
}

echo "</div>";

