<?php
echo "<h2>Welcome to ParkNShop!</h2>";
$conn = mysqli_connect('localhost', 'root', '123','parknshop');
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT count(id) FROM `shopping_list`";
$result = mysqli_query($conn, $sql);
$num=mysqli_fetch_row($result);
$total=$num[0];

$stride=3;
$numofpage=ceil($total/$stride);
$start=0;
if (!empty($_GET['page'])){
	$page=$_GET['page'];
	$start+=$page*$stride;
}

$sql = "SELECT * FROM `shopping_list` limit ".$start.",".$stride;
$result = mysqli_query($conn, $sql);


echo "<table border='1' style='border-collapse: collapse;'>";
echo "	<tr>
			<td>ID</td>
			<td>NAME</td>
			<td>PRICE</td>
			<td>DATE</td>
			<td>INFO</td>
		";

if ($num > 0) {
	// output data of each row
	while($row = mysqli_fetch_assoc($result)) {
		echo "	<tr>
					<td>".$row['id']."</td>
					<td>".$row['name']."</td>
					<td>".$row['price']."</td>
					<td>".$row['date']."</td>
					<td style='width:300px;'>".$row['info']."</td>
				";
	}
}

	echo "</table>";
	$i=0;
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	while ($i<$numofpage){
		echo  "[";
		echo "<a href='Main.php?page=".$i."'>".$i."</a>";
		echo  "]";
		$i+=1;
	}
	mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ParkNShop</title>
<script type='text/javascript' src="moment.js"></script>
<!-- <script src="http://momentjs.com/downloads/moment.js"></script> -->
</head>
<body>
<h3>Increase new items</h3>
	<form action="additem.php" method="post">
		<table border='1' style='border-collapse: collapse;'>
		<tr>
			<td>ID</td>
			<td>NAME</td>
			<td>PRICE</td>
			<td>DATE</td>
			<td>INFO</td>
			<td>OP</td>
		</tr>
		<tr>
			<td><input type="text" style='width:100px;border:0px;' name="id"></td>
			<td><input type="text" style='width:100px;border:0px;' name="name"></td>
			<td><input type="text" style='width:100px;border:0px;' name="price"></td>
			<td><input type="date"  style='width:100px;border:0px;' id="date" name="date"></td>
			<td><input type="text" style='width:150px;border:0px;' name="info"></td>
			<td><input type="submit"  style="background:pink;color:blue;width:80px;" value="add"></td>
		</tr>
		</table>
		
	</form>
</body>
</html>
<script type="text/javascript">
window.onload=function()
{
	var date=moment().format('YYYY-MM-D');
	document.getElementById("date").value=date;
}
<!--

//-->
</script>