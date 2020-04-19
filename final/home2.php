<?php session_start();  
include('condb.php');

  $ID = $_SESSION['ID'];
  $name = $_SESSION['name'];
  $level = $_SESSION['level'];
 	if($level!='staff'){
    Header("Location: ../logout.php");  
  }  
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css"><script src="https://kit.fontawesome.com/a076d05399.js"></script>
    
</head>
<body>
    <nav>
    
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">TPC</label>
        <ul>
            <li><a href="#">รายงานยอดขาย</a></li>
            <li><a href="#">ข้อมูลพนักงาน</a></li>
            <li><a href="#">จัดการเมนูอาหาร</a></li>
            <form action="logout.php">
            <li><a input ="submit" href="#">Logout</a></li>
            </form>
        </ul>
    
        

    </nav>
    <section>
    </section>
	
    
</body>
</html>

