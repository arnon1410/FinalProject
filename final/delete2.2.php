<?php 
$con= mysqli_connect("localhost","root","","final") or die("Error: " . mysqli_error($con));
mysqli_query($con, "SET NAMES 'utf8' ");
error_reporting( error_reporting() & ~E_NOTICE );
date_default_timezone_set('Asia/Bangkok');
$db = mysqli_select_db($con,'final');

if(isset($_POST['deletedata']))
{
    $productid = $_POST['delete_ID'];

    $sql= "DELETE FROM products WHERE productid='$productid' ";
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
