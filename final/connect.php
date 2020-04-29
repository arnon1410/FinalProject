<?php
$con= mysqli_connect("localhost","root","","final") or die("Error: " . mysqli_error($con));
mysqli_query($con, "SET NAMES 'utf8' ");
error_reporting( error_reporting() & ~E_NOTICE );
date_default_timezone_set('Asia/Bangkok');
$db = mysqli_select_db($con,'final');
if(isset($_POST['container']))
{
    $ID = $_POST['ID'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $level = $_POST['level'];
    $gender = $_POST['gender'];

$query = "SELECT * FROM ID ORDER BY ID asc" or die("Error:" . mysqli_error()); 
//3. execute the query. 
$result = mysqli_query($con, $query); 
//4 . แสดงข้อมูลที่ query ออกมา: 

//ใช้ตารางในการจัดข้อมูล
echo "<table border='1' align='center' width='500'>";
//หัวข้อตาราง
echo "<tr align='center' bgcolor='#CCCCCC'><td>รหัส</td><td>Uername</td><td>ชื่อ</td><td>นามสกุล</td><td>อีเมล์</td><td>แก้ไข</td><td>ลบ</td></tr>";
while($row = mysqli_fetch_array($result)) { 
  echo "<tr>";
  echo "<td>" .$row["ID"] .  "</td> "; 
  echo "<td>" .$row["username"] .  "</td> ";  
  echo "<td>" .$row["password"] .  "</td> ";
  echo "<td>" .$row["name"] .  "</td> ";
  echo "<td>" .$row["level"] .  "</td> ";
  echo "<td>" .$row["gender"] .  "</td> ";

  //5. close connection
mysqli_close($con);
?>