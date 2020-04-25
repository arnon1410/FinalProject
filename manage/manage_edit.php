<?php
//1. เชื่อมต่อ database:
$dbhost = 'localhost';
$dbuser = 'coffee.f';
$dbpass = 'IoJOCjBp1QDiSqAz';
$dbname = 'coffee.f';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$productid = $_GET["ID"];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT * FROM products";
$result2 = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result2);
extract($row);

//2. query ข้อมูลจากตาราง 
$query = "SELECT * FROM products ORDER BY productID asc" or die("Error:" . mysqli_error());
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
?>
<div class="container">
  <div class="row">
      <form  name="addproduct" action="manage_add.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-9">
            <p> รหัสสินค้า</p>
            <input type="text"  name="ProductID" class="form-control" required placeholder="รหัสสินค้า" / value="<?php echo $productid; ?>">
          </div>
        </div>
		<div class="form-group">
          <div class="col-sm-9">
            <p> ชื่อสินค้า</p>
            <input type="text"  name="ProductName" class="form-control" required placeholder="ชื่อสินค้า" / value="<?php echo $productname; ?>">
          </div>
        </div>        
        <div class="form-group">
          <div class="col-sm-12">
            <p> ราคาสินค้า </p>
             <textarea  name="Price" rows="5" cols="60"><?php echo $price; ?>
             </textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
             <input type="hidden" name="ProductID" value="<?php echo $productid; ?>" />
            <button type="submit" class="btn btn-success" name="btnadd"> บันทึก </button>
            
          </div>
        </div>
      </form>
    </div>
  </div>