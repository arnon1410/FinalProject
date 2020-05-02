<?php session_start();
include('condb.php');

  $ID = $_SESSION['ID'];
  $name = $_SESSION['name'];
  $level = $_SESSION['level'];
  $username = $_SESSION['username'];
 	if($level!='staff'){
    Header("Location: ../logout.php");  
  }  
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style5.css"> 
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">TPC®</label>
        <ul>
            <li><a class="active" href="home.php">HOME</a></li>
            <li><a href="orderf.php">Order food</a></li>
            <li><a href="circulation.php">Circulation</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <section>
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
						$conn= mysqli_connect("localhost","root","","final") or die("Error: " . mysqli_error($conn));
						mysqli_query($conn, "SET NAMES 'utf8' ");
						error_reporting( error_reporting() & ~E_NOTICE );
						date_default_timezone_set('Asia/Bangkok');
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
								$id = $row['productid'];
								$pri = $row['price'];
							}
						}
 
					?>
					<tr>
						<td colspan="3" align="right"><b>Total</b></td>
						<td><b><?php echo number_format($total, 2); ?></b></td>
					</tr>
				</tbody>
				<?php
				

				date_default_timezone_set('Asia/Bangkok');
				$dttm = Date("Y-m-d");
				$sql1 = "INSERT INTO sales (SaleDate, username, GrandTotal)
						VALUES ('$dttm', '$username','$total')";
				$result1 = mysqli_query($conn, $sql1) or die ("Error in query: $sql1 " . mysqli_error());

				//table2
				$sql3 = "INSERT INTO sale_details (productid, price, Quantity)
						VALUES ('$id', '$pri', '$index')";
				$result3 = mysqli_query($conn, $sql3) or die ("Error in query: $sql3 " . mysqli_error());
			?>
			</table>
			<a  href="javascript:window.print()">Print</a>
			<a href = "orderf.php" align = "right">...</a>
	
			</form>
		</div>
	</div>
</div>

    </section>
    
</body>
</html>

