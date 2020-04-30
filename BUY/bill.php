<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>BILL</title>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">ใบเสร็จรับเงิน</h1>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<?php 
			if(isset($_SESSION['message'])){
				?>
				<div class="alert alert-info text-center">
					<?php echo $_SESSION['message']; ?>
				</div>
				<?php
				unset($_SESSION['message']);
			}
 
			?>
			<form method="POST" action="bill.php">
			<table class="table table-bordered table-striped">
				<thead>
					<th>Name</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Subtotal</th>
				</thead>
				<tbody>
					<?php

						//initialize total
						$total = 0;
						if(!empty($_SESSION['cart'])){
						//connection
						$conn = new mysqli('localhost', 'finalproject', '9C1nbfGic9ioJehv', 'finalproject');
						//create array of initail qty which is 1
 						$index = 0;
 						if(!isset($_SESSION['qty_array'])){
 							$_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
 						}
						$sql = "SELECT * FROM products WHERE productid IN (".implode(',',$_SESSION['cart']).")";
						$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
								?>
								
								<tr>
									<td><?php echo $row['productname']; ?></td>
									<td><?php echo number_format($row['price'], 2); ?> ฿</td>
									<input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
									<td><input type="text" class="form-control" value="<?php echo $_SESSION['qty_array'][$index]; ?>" name="qty_<?php echo $index; ?>"></td>
									<td><?php echo number_format($_SESSION['qty_array'][$index]*$row['price'], 2); ?> ฿</td>
									<?php $total += $_SESSION['qty_array'][$index]*$row['price']; ?>
								</tr>
								<?php
								$index ++;
							}
						}
 
					?>
					<tr>
						<td colspan="3" align="right"><b>Total</b></td>
						<td><b><?php echo number_format($total, 2); ?></b></td>
					</tr>
				</tbody>
				<?php
				$id = $_SESSION["productid"];
				$Price = $_SESSION["price"];
				date_default_timezone_set('Asia/Bangkok');
				$dttm = Date("Y-m-d");
				$sql1 = "INSERT INTO sales (SaleDate, GrandTotal)
					VALUES ('$dttm', '$total')";
				$result1 = mysqli_query($conn, $sql1) or die ("Error in query: $sql1 " . mysqli_error());
				/*$sql2	= "SELECT * FROM products WHERE productid=$row['productid']";
				$query2	= mysqli_query($conn, $sql2);
				$row2	= mysqli_fetch_array($query2);
				$result2 = mysqli_query($conn, $sql2) or die ("Error in query: $sql2 " . mysqli_error());*/
				//table2
				$sql3 = "INSERT INTO sale_details (ProductID, price, Quantity)
					VALUES ('$id', '$Price', '$index')";
				$result3 = mysqli_query($conn, $sql3) or die ("Error in query: $sql3 " . mysqli_error());
			?>
			</table>
			<a  href="javascript:window.print()">Print</a>
			<a href = "e1index.php" align = "right">...</a>
			
			</form>
		</div>
	</div>
</div>
</body>
</html>