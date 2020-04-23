<?php 
$con= mysqli_connect("localhost","root","","final") or die("Error: " . mysqli_error($con));
mysqli_query($con, "SET NAMES 'utf8' ");
error_reporting( error_reporting() & ~E_NOTICE );
date_default_timezone_set('Asia/Bangkok');
$db = mysqli_select_db($con,'final');

if(isset($_POST['insertdata']))
{
    $ProductID = $_POST['productid'];
    $ProductName = $_POST['productName'];
    $Price = $_POST['price'];

    $sql="INSERT INTO products( `productid`,`productname`,`price`) VALUES ('$productid','$productname','$price')";
    $result = mysqli_query($con,$sql);

    if($result)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: managef2.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }

}
?>
