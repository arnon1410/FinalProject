<?php
include('connectdata.php');   
	date_default_timezone_set('Asia/Bangkok');
	$id = $_GET["ProductID"];
	$Price = $_POST["Price"];
	$qty = $_POST["Quantity"];
	$total = $_POST['total'];
	$dttm = Date("Y-m-d");
	//table1
	$sql = "INSERT INTO sales (SaleDate, GrandTotal)
			 VALUES ('$dttm', '$total')";
	$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
	//table2

	foreach($_SESSION["shopping_cart"] as $keys => $values)
	{
	$sql2	= "SELECT * FROM products WHERE ProductID = $id";
	$result2	= mysqli_query($conn, $sql2);
	$values	= mysqli_fetch_array($result2);
	$total	= $total + ($values["Quantity"] * $values["Price"]);
	$sql3 = "INSERT INTO sale_details (ProductID, Price, Quantity)
			 VALUES ('$id', '$Price', '$qty')";
	$result3 = mysqli_query($conn, $sql3) or die ("Error in query: $sql3 " . mysqli_error());
	}
	
	if($result && $result3){
	echo "<script type='text/javascript'>";
	echo "alert('Save Succesfuly');";
	echo "window.location = 'index11.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error!!');";
	echo "</script>";
	}
?>