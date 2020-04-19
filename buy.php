<?php
	session_start();
	
	echo'<pre>';
	print($_SESSION);
	echo'</pre>';
	
	include'connectdata.php';
	$ProductID =mysqli_real_escape_string($conn, $_GET['ProductID']); 
	$act = mysqli_real_escape_string($conn, $_GET['act']);
	
	if($act=='add' && !empty($ProductID))
	{
		if(isset($_SESSION['buy'][$ProductID]))
		{
			$_SESSION['buy'][$ProductID]++;
		}
		else
		{
			$_SESSION['buy'][$ProductID]=1;
		}
	}
 
	if($act=='remove' && !empty($ProductID))  //ยกเลิกการสั่งซื้อ
	{
		unset($_SESSION['buy'][$ProductID]);
	}
 
	if($act=='update')
	{
		$Amount_array = $_POST['Amount'];
		foreach($Amount_array as $ProductID=>$Amount)
		{
			$_SESSION['buy'][$ProductID]=$Amount;
		}
	}
?>
 
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping Cart</title>
</head>
 
<body>
<form id="frmcart" name="frmcart" method="post" action="?act=update">
  <table width="900" border="0" align="center" class="square">
    <tr>
      <td colspan="5" bgcolor="#CCCCCC">
      <b>รายการสินค้า</span></td>
    </tr>
    <tr>
		<td bgcolor="#EAEAEA">สินค้า</td>
		<td align="center" bgcolor="#EAEAEA">ราคา</td>
		<td align="center" bgcolor="#EAEAEA">จำนวน</td>
		<td align="center" bgcolor="#EAEAEA">รวม(บาท)</td>
		<td align="center" bgcolor="#EAEAEA">ลบ</td>
    </tr>
<?php

$total=0;
if(!empty($_SESSION['buy']))
{
	foreach($_SESSION['buy'] as $ProductID=>$Quantity)
	{
		$sql = "SELECT * FROM products WHERE ProductID=$ProductID";
		$query = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($query);
		$sum = $row['Price'] * $Quantity;
		$Total += $sum;
		echo "<tr>";
		echo "<td width='334'>" . $row["ProductName"] . "</td>";
		echo "<td width='46' align='right'>" .number_format($row["Price"],2) . "</td>";
		echo "<td width='57' align='right'>";  
		echo "<input type='number' name='Amount[$ProductID]' value='$Quantity' size='2'/></td>";
		echo "<td width='93' align='right'>".number_format($sum,2)."</td>";
		//remove product
		echo "<td width='46' align='center'><a href='buy.php?ProductID=$ProductID&act=remove'>ลบ</a></td>";
		echo "</tr>";
	}
	echo "<tr>";
  	echo "<td colspan='3' bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
  	echo "<td align='right' bgcolor='#CEE7FF'>"."<b>".number_format($Total,2)."</b>"."</td>";
  	echo "<td align='left' bgcolor='#CEE7FF'></td>";
	echo "</tr>";
}
?>
<br>
<tr>
<td width="150"><br><a href="test.php">กลับหน้ารายการสินค้า</a></td>
<td colspan="4" align="right">
    <input type="submit" name="button" id="button" value="ปรับปรุง" />
    <input type="button" name="Submit2" value="สั่งซื้อ" onclick="window.location='confirm.php';" />
</td>
</tr>
</table>
</form>
</body>
</html>