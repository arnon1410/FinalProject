<?php session_start();
include('condb.php');

  $ID = $_SESSION['ID'];
  $name = $_SESSION['name'];
  $level = $_SESSION['level'];
 	if($level!='admin'){
    Header("Location: ../logout.php");  
  }  
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style1.css">	    
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">TPC®</label>
        <ul>
            <li><a class="active" href="home2.php">HOME</a></li>
            <li><a href="circulation2.php">Sales report</a></li>
            <li><a href="employinfor.php">Manage employees</a></li>
            <li><a href="managef.php">DRINK MANAGEMENT</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <section>
    <div class="post">
        <div class="post-s">
            <h2>
            WELCOME
                  TO
                THREE PIGGY CAFE</h2>
        </div>
    </section>
    
</body>
</html>

