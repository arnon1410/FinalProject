<?php 
$con= mysqli_connect("localhost","root","","final") or die("Error: " . mysqli_error($con));
mysqli_query($con, "SET NAMES 'utf8' ");
error_reporting( error_reporting() & ~E_NOTICE );
date_default_timezone_set('Asia/Bangkok');
$db = mysqli_select_db($con,'final');

if(isset($_POST['updatedata']))
{
    $ID = $_POST['ID'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $level = $_POST['level'];
    $gender = $_POST['gender'];

    $sql= "UPDATE login SET username='$username',password='$password',name='$name',level='$level',gender='$gender' WHERE ID='$ID' ";
    $result = mysqli_query($con,$sql);

    if($result)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: employinfor2.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }

}
?>
