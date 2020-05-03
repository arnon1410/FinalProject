<?php session_start();
include('condb.php');

  $ID = $_SESSION['ID'];
  $username = $_SESSION['username'];
  $password = $_SESSION['password'];
  $name = $_SESSION['name'];
  $level = $_SESSION['level'];
  $gender = $_SESSION['gender'];
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
    <link rel="stylesheet" href="style.css">	    
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">

    

</head>
<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">Staff : <?php echo$name?> </label>
        <ul>
            <li><a href="home.php">HOME</a></li>
            <li><a href="orderf.php">Order food</a></li>
            <li><a href="circulation.php">Circulation</a></li>
            <li><a class="active" href="profile.php">Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <section>
    <div class="row col-md-6 col-md-offset-3">
        <div class="panel panel-success">
          <div class="panel-heading text-center">
            <h1>PROFILE</h1>
          </div>
          <div class="panel-body">
            <form action="condb.php" method="post">
              <div class="form-group">
                <label for="ID">ID</label>
                <input type="text" class="form-control" id="ID" name="ID" value="<?=$ID;?>"/>
              </div>
			  <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?=$username;?>"/>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" name="password" value="<?=$password;?>"/>
              </div>
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?=$name;?>"/>
              </div>
              <div class="form-group">
                <label for="level">Level</label>
                <input type="text" class="form-control" id="level" name="level" value="<?=$level;?>"/>
              </div>
              <div class="form-group">
                <label for="gender">Gender</label>
                <input type="text" class="form-control" id="gender" name="gender" value="<?=$gender;?>"/>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
    </section>
    
</body>
</html>

