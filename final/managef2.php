<?php session_start();  
include('condb.php');

  $ID = $_SESSION['ID'];
  $name = $_SESSION['name'];
  $level = $_SESSION['level'];
 	if($level!='manager'){
    Header("Location: ../logout.php");  
  }  
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

 
</head>
<body>
    <nav>
    
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">TPC®</label>
        <ul>
            <li><a href="home3.php">HOME</a></li>
            <li><a href="circulation3.php">Sales report</a></li>
            <li><a href="employinfor2.php">Manage employees</a></li>
            <li><a class="active" href="managef2.php">DRINK MANAGEMENT</a></li>
            <li><a href="logout.php">Logout</a></li>  
        </ul>

    </nav>
    <section>
        <!-- Modal -->
        <div class="modal fade" id="drinkModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Drink Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
    <form action="insert2.2.php" method="POST">
        <div class="modal-body">
                <div class="form-group">
                    <label>ProductID</label>
                    <input type="text" name="productid" class="form-control" placeholder="Enter id">
                </div>
                <div class="form-group">
                    <label>ProductName</label>
                    <input type="text" name="productname" class="form-control" placeholder="Enter username">
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" name="price" class="form-control" placeholder="Enter passsword">
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="insertdata" class="btn btn-dark">Save Data</button>
        </div>
    </form>
        </div>
    </div>
</div>


<!-- ####################################################################################################################################### -->
<!-- Edit FORM -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Drink Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
    <form action="update2.2.php" method="POST">
        <div class="modal-body">
        <div class="form-group">
                    <label>ProductID</label>
                    <input type="text" name="productid" id="productid" class="form-control" placeholder="Enter Productid">
                </div>
                <div class="form-group">
                    <label>ProductName</label>
                    <input type="text" name="productname" id="productname" class="form-control" placeholder="Enter productname">
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" name="price" id="price" class="form-control" placeholder="Enter price">
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="updatedata" class="btn btn-dark">Update Data</button>
        </div>
    </form>
        </div>
    </div>
</div>
<!--##########################################################################################################################################-->



<!-- ############################################################################################################# -->
<!-- DELETE FORM -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Drink Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
    <form action="delete2.2.php" method="POST">
        <div class="modal-body">
                <div class="form-group">
                    <label>ProductID</label>
                    <input type="text" name="delete_ID" id="delete_ID" class="form-control" placeholder="Enter productid">
                </div>
                <h4> Do you want Delete this data ???
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
            <button type="submit" name="deletedata" class="btn btn-dark">YES !! Delete it.</button>
        </div>
    </form>
        </div>
    </div>
</div>
<!--######################################################################################################################################-->


        <div class="container">
            <div class="jumbotron">
                <div class="card">
                    <h2>DRINK MANAGEMENT</h2>
                </div>
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#drinkModal">
                            ADD DATA
                        </button>
                    </div>
                </div>

                <div class="card">
                    <div class ="class-body">

                    <?php 
                        $con= mysqli_connect("localhost","root","","final") or die("Error: " . mysqli_error($con));
                        $db = mysqli_select_db($con,'final');
                        mysqli_query($con, "SET NAMES 'utf8' ");
                        error_reporting( error_reporting() & ~E_NOTICE );
                        date_default_timezone_set('Asia/Bangkok');
                        

                        $query="SELECT * FROM products";
                        $result = mysqli_query($con,$query);
                    ?>
                        <table id="example" class="table table-dark">
                            <thead>
                                <tr>
                                <th scope="col">ProductID</th>
                                <th scope="col">ProductName</th>
                                <th scope="col">Price</th>
                                <th scope="col">EDIT</th>
                                <th scope="col">DELETE</th>
                                </tr>
                            </thead>
                    <?php
                        if($result)
                        {
                            foreach($result as $row)
                            {
                    ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $row['productid']?></td>
                                    <td><?php echo $row['productname']?></td>
                                    <td><?php echo $row['price']?></td>
                                    <td>
                                        <button type="button" class="btn btn-success editbtn">EDIT</button> 
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger deletebtn">DELETE</button> 
                                    </td>

                                </tr>
                            </tbody>
                    <?php
                            }

                        }
                        else
                        {
                            echo"No Record Found";
                        }
                    ?>
                        </table>
                    </div>

                </div>



            </div>
        </div>

    </section>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('.deletebtn').on('click',function() {

            $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_ID').val(data[0]);


        });

    });
</script>

    
<script>
    $(document).ready(function () {
        $('.editbtn').on('click',function() {

            $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#productid').val(data[0]);
                $('#productname').val(data[1]);
                $('#price').val(data[2]);


        });

    });
</script>

</body>

</html>

