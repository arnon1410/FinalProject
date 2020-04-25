<meta charset="UTF-8">
<?php
$dbhost = 'localhost';
$dbuser = 'coffee.f';
$dbpass = 'IoJOCjBp1QDiSqAz';
$dbname = 'coffee.f';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
date_default_timezone_set('Asia/Bangkok');
	//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
	$date1 = date("Ymd_His");
	//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
	$numrand = (mt_rand());
	//รับค่าไฟล์จากฟอร์ม
$ProductName = $_POST['ProductName'];
$ProductID = $_POST['ProductID'];
$Price = $_POST['Price'];
	// เพิ่มไฟล์เข้าไปในตาราง uploadfile
	
		$sql = "INSERT INTO products
		(
		ProductName,
		ProductID,
		Price
		)
		VALUES
		(
		'$ProductName',
		'$ProductID',
		'$Price')";
		
		$result = mysqli_query($con, $sql);// or die ("Error in query: $sql " . mysqli_error());
	
	mysqli_close($con);
	// javascript แสดงการ upload file
	
	
	if($result){
echo "<script type='text/javascript'>";
echo "alert('Add Succesfuly');";
echo "window.location = 'product.php'; ";
echo "</script>";
}
else{
echo "<script type='text/javascript'>";
echo "alert('Error back to upload again');";
echo "window.location = 'product.php'; ";
echo "</script>";
}
?>