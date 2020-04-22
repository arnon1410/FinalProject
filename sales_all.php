
<html lang="en">
<head>
<meta charset="UTF-8">
<title>ไอ้ต้าวเว็บดอกทอง</title>
<h3 align="center">ยอดขายทั้งหมด</h3>
</head>
<body BGCOLOR = #38d39f>
<?php
$thai_month_arr=array(
    "0"=>"",
    "1"=>"มกราคม",
    "2"=>"กุมภาพันธ์",
    "3"=>"มีนาคม",
    "4"=>"เมษายน",
    "5"=>"พฤษภาคม",
    "6"=>"มิถุนายน", 
    "7"=>"กรกฎาคม",
    "8"=>"สิงหาคม",
    "9"=>"กันยายน",
    "10"=>"ตุลาคม",
    "11"=>"พฤศจิกายน",
    "12"=>"ธันวาคม"                 
);
?>
<br>
<div align="center">
 
  <form method="post" action="">
    เลือกเดือน
    <select name="month_check" id="month_check">
      <?php for($i=1;$i<=12;$i++){ ?>
      <option value="<?=sprintf("%02d",$i)?>" <?=((isset($_POST['month_check']) && $_POST['month_check']==sprintf("%02d",$i)) || (!isset($_POST['month_check']) && date("m")==sprintf("%02d",$i)))?" selected":""?> >
      <?=$thai_month_arr[$i]?>
      </option>
      <?php } ?>
    </select>
    ปี
    <select name="year_check" id="year_check">
    <?php
    $data_year=intval(date("Y",strtotime("-2 year")));
    ?>
      <?php for($i=0;$i<=5;$i++){ ?>
      <option value="<?=$data_year+$i?>" <?=((isset($_POST['year_check']) && $_POST['year_check']==intval($data_year+$i)) || (!isset($_POST['year_check']) && date("Y")==intval($data_year+$i)))?" selected":""?> >
      <?=intval($data_year+$i)+543?>
      </option>
      <?php } ?>
    </select>
    <input type="submit" name="showData" id="showData" value="แสดงข้อมูล" />
  </form>
</div>
</body>
</html>