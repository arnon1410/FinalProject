<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
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
	
//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
	$ProductName = $_POST['ProductName'];
	$ProductID = $_POST['ProductID'];
	$Price = $_POST['Price'];
//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
	
	$sql = "UPDATE products SET  
			ProductName='$ProductName',
			ProductID='$ProductID', 
			Price='$Price',
			WHERE ProductID='$ProductID' ";

$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

mysqli_close($con); //ปิดการเชื่อมต่อ database 

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('Update Succesfuly');";
	echo "window.location = 'product.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to Update again');";
	echo "</script>";
}
?><meta charset="UTF-8">