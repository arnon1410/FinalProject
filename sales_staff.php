<?php
$dbhost = 'localhost';
$dbuser = 'coffee.f';
$dbpass = 'IoJOCjBp1QDiSqAz';
$dbname = 'coffee.f';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
?>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>ไอต้าวเว็บหัวควย</title>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
</head>
<body>
<div class="container">
    <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-4">
    <br>
    <b>
	<h3 align="center">ยอดขายของคุณ</h3>
    </b>
	<form action="do_login.php" method="post">
 <?php
	function convertToDateSQL($date){
	$value = explode('/',$date);
	$newDate = "$value[2]-$value[1]-$value[0]";
	return $newDate;
}

          $newdoc_date = convertToDateSQL($_POST['doc_date']);
 ?>

<p> <h3 align="center"><input type="text" id="datepicker" name="doc_date" value="เลือกวันที่"  />
			<button type="submit" name="save" class="btn btn-info"> ดูยอดขาย </button></h3>
</p> 
</body>
</html>