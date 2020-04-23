<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product List</title>
 
</head>
 
<body>
<table width="600" border="1" align="center" bordercolor="#666666">
  <tr>
    <td width="91" align="center" bgcolor="#CCCCCC"><strong>รหัสสินค้า</strong></td>
    <td width="200" align="center" bgcolor="#CCCCCC"><strong>ชื่อสินค้า</strong></td>
    <td width="44" align="center" bgcolor="#CCCCCC"><strong>ราคา</strong></td>
	<td width="60" align="center" bgcolor="#CCCCCC"><strong>สั่งซื้อ</strong></td>
  </tr>
  
<?php
$dbhost = 'localhost';
$dbuser = 'finalproject';
$dbpass = '9C1nbfGic9ioJehv';
$dbname = 'finalproject';
$uname=$_POST['user'];
$password=$_POST['pass'];
$n = $_POST["search"];

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql); 
 while($row = mysqli_fetch_array($result))
 { 
?>
	<tr>
		<td><div align="center"><?php echo $row["ProductID"];?></td>
		<td><div align="left"><?php echo $row["ProductName"];?></td>
		<td><div align="center"><?php echo $row["Price"];?></td>
		<td align='center'><a href='buy.php?ProductID=$row[ProductID]&act=add'>สั่งซื้อ</a></td>
	</tr>
<?php
}
mysqli_close($conn);
?>
</table>