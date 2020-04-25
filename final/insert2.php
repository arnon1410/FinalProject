<?php 
$con= mysqli_connect("localhost","root","","final") or die("Error: " . mysqli_error($con));
mysqli_query($con, "SET NAMES 'utf8' ");
error_reporting( error_reporting() & ~E_NOTICE );
date_default_timezone_set('Asia/Bangkok');
$db = mysqli_select_db($con,'final');

if(isset($_POST['insertdata']))
{
    $productid = $_POST['productid'];
    $productname = $_POST['productname'];
    $price = $_POST['price'];

    $query="INSERT INTO products( `productid`,`productname`,`price`) VALUES ('$productid','$productname','$price')";
    $query_run= mysqli_query($con,$query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: managef.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }

}
?>
