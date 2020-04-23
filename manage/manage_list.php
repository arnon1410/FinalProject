<?php
//1. เชื่อมต่อ database:
$dbhost = 'localhost';
$dbuser = 'coffee.f';
$dbpass = 'IoJOCjBp1QDiSqAz';
$dbname = 'coffee.f';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
//2. query ข้อมูลจากตาราง 
$query = "
SELECT * FROM products" or die("Error:" . mysqli_error());
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:

echo  ' <table class="table table-hover">';
  //หัวข้อตาราง
    echo "<tr>
      <td width='5%'>ID</td>
      <td width=30%>name</td>
      <td width=5%>price</td>
      <td width=5%>edit</td>
      <td width=5%>delete</td>
    </tr>";
  while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
    echo "<td>" .$row["ProductID"] .  "</td> ";
    echo "<td>" .$row["ProductName"] .  "</td> ";
    echo "<td>" .$row["Price"] .  "</td> ";
    //แก้ไขข้อมูล
    echo "<td><a href='product.php?act=edit&ID=$row[0]' class='btn btn-warning btn-xs'>edit</a></td> ";
    
    //ลบข้อมูล
    echo "<td><a href='manage_delect.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>del</a></td> ";
  echo "</tr>";
  }
echo "</table>";
//5. close connection
mysqli_close($con);
?>