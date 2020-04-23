<?php 
/* code by webdevtrick ( https://webdevtrick.com ) */
session_start();
$connect = mysqli_connect("localhost", "finalproject", "9C1nbfGic9ioJehv", "finalproject");

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_ProductID = array_column($_SESSION["shopping_cart"], "item_ProductID");
		if(!in_array($_GET["ProductID"], $item_array_ProductID))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_ProductID'			=>	$_GET["ProductID"],
				'item_ProductName'			=>	$_POST["hidden_ProductName"],
				'item_Price'		=>	$_POST["hidden_Price"],
				'item_Quantity'		=>	$_POST["Quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_ProductID'			=>	$_GET["ProductID"],
			'item_ProductName'			=>	$_POST["hidden_ProductName"],
			'item_Price'		=>	$_POST["hidden_Price"],
			'item_Quantity'		=>	$_POST["Quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_ProductID"] == $_GET["ProductID"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="index11.php"</script>';
			}
		}
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Three Pig</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	<body>
		<br />
		<div class="container">
			<br />
			<br />
			<br />
			<h3 align="center">รายการสินค้า</h3><br />
			<br /><br />
			<?php
				$query = "SELECT * FROM products ORDER BY ProductID ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			<div class="col-md-4">
				<form method="post" action="index11.php?action=add&ProductID=<?php echo $row["ProductID"]; ?>">
					<div style="border:3px solid #5cb85c; background-color:whitesmoke; border-radius:5px; padding:16px;" align="center">

						<h4 class="text-info"><?php echo $row["ProductName"]; ?></h4>

						<h4 class="text-danger">$ <?php echo $row["Price"]; ?></h4>

						<input type="text" name="Quantity" value="1" class="form-control" />

						<input type="hidden" name="hidden_ProductName" value="<?php echo $row["ProductName"]; ?>" />

						<input type="hidden" name="hidden_Price" value="<?php echo $row["Price"]; ?>" />

						<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />

					</div>
				</form>
			</div>
			<?php
					}
				}
			?>
			<div style="clear:both"></div>
			<br />
			<h3>Order Details</h3>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th width="40%">Item Name</th>
						<th width="10%">Quantity</th>
						<th width="20%">Price</th>
						<th width="15%">Total</th>
						<th width="5%">Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["item_ProductName"]; ?></td>
						<td><?php echo $values["item_Quantity"]; ?></td>
						<td>$ <?php echo $values["item_Price"]; ?></td>
						<td>$ <?php echo number_format($values["item_Quantity"] * $values["item_Price"], 2);?></td>
						<td><a href="index11.php?action=delete&ProductID=<?php echo $values["item_ProductID"]; ?>"><span class="text-danger">Remove</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_Quantity"] * $values["item_Price"]);
						}
					?>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right">$ <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
					<?php
					}
					?>
						
				</table>
			</div>
		</div>
	</div>
	<br />
	</body>
</html>

