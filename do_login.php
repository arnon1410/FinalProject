<?php
$dbhost = 'localhost';
$dbuser = 'finalproject';
$dbpass = '9C1nbfGic9ioJehv';
$dbname = 'finalproject';
$uname=$_POST['user'];
$password=$_POST['pass'];
session_start();

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$result=mysqli_query($conn,"SELECT staffName,staffPassword,StaffLevel
FROM staffs WHERE staffName = '$uname' && staffPassword = '$password'");
$count=mysqli_num_rows($result);
$row=myaqli_fetch_array($result);
if($count==1)
{	$_SESSION["StaffLevel"]=$row["StaffLevel"];
	$_SESSION['log']=1;
	if($_SESSION["StaffLevel"]=="Manager"){
		header("location: grap2.php");
	}
	if($_SESSION["StaffLevel"]=="Staff"){
		header("location: grap.php");
	}	
}
else
{
	header("location: login.php");
}

?>