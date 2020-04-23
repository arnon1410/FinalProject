<?php session_start();
include('condb.php');

$ID = $_SESSION['ID'];
$name = $_SESSION['name'];
$level = $_SESSION['level'];
if ($level != 'admin') {
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
            <li><a href="#">Sales report</a></li>
            <li><a class="active" href="employinfor.php">Manage employees</a></li>
            <li><a href="managef.php">Food management</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>



    </nav>
    <section>
        <!-- Modal -->
        <div class="modal fade" id="employleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Employ Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
    <form action="insert1.php" method="POST">
        <div class="modal-body">
                <div class="form-group">
                    <label>ID</label>
                    <input type="text" name="ID" class="form-control" placeholder="Enter id">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Enter username">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter passsword">
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label>Level</label>
                    <input type="text" name="level" class="form-control" placeholder="Enter level">
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <input type="text" name="gender" class="form-control" placeholder="Enter gender">
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


<!-- ############################################################################################################# -->
<!-- Edit FORM -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Employ Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
    <form action="update.php" method="POST">
        <div class="modal-body">
                <div class="form-group">
                    <label>ID</label>
                    <input type="text" name="ID" id="ID" class="form-control" placeholder="Enter id">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter username">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter passsword">
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label>Level</label>
                    <input type="text" name="level" id="level" class="form-control" placeholder="Enter level">
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <input type="text" name="gender" id="gender" class="form-control" placeholder="Enter gender">
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
<!--#######################################################################################################################-->



<!-- ############################################################################################################# -->
<!-- DELETE FORM -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Employ Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
    <form action="delete.php" method="POST">
        <div class="modal-body">
                <div class="form-group">
                    <label>ID</label>
                    <input type="text" name="delete_ID" id="delete_ID" class="form-control" placeholder="Enter id">
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
<!--#######################################################################################################################-->


        <div class="container">
            <div class="jumbotron">
                <div class="card">
                    <h2>MANAGE EMPLOYEES</h2>
                </div>
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#employleModal">
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
                        

                        $query="SELECT * FROM login";
                        $result = mysqli_query($con,$query);
                    ?>
                        <table id="datatableid" class="table table-dark">
                            <thead>
                                <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Username</th>
                                <th scope="col">Password</th>
                                <th scope="col">Name</th>
                                <th scope="col">Level</th>
                                <th scope="col">Gender</th>
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
                                    <td><?php echo $row['ID']?></td>
                                    <td><?php echo $row['username']?></td>
                                    <td><?php echo $row['password']?></td>
                                    <td><?php echo $row['name']?></td>
                                    <td><?php echo $row['level']?></td>
                                    <td><?php echo $row['gender']?></td>
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
        $(document).ready(function() {

            $('#datatableid').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search Your Data",
                }
            });
        });
    </script>

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

            $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#ID').val(data[0]);
                $('#username').val(data[1]);
                $('#password').val(data[2]);
                $('#name').val(data[3]);
                $('#level').val(data[4]);
                $('#gender').val(data[5]);


        });

    });
    </script>

</body>

</html>