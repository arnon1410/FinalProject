<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
$dbhost = 'localhost';
$dbuser = 'coffee.f';
$dbpass = 'IoJOCjBp1QDiSqAz';
$dbname = 'coffee.f';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
//สร้างตัวแปรสำหรับรับค่า member_id จากไฟล์แสดงข้อมูล
$ProductID = $_REQUEST["ID"];
 
//ลบข้อมูลออกจาก database ตาม member_id ที่ส่งมา
 
$sql = "DELETE FROM products WHERE ProductID='$ProductID' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
 
//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
  
  if($result){
  echo "<script type='text/javascript'>";
  echo "window.location = 'type.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to delete again');";
  echo "</script>";
}
?>