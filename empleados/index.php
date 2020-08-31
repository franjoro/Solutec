<?php
session_start();
include_once("../php/conexion.php");
if(isset($_SESSION['user'])){ 
$row = mysqli_fetch_array(mysqli_query($mysqli , "SELECT name FROM `tb_empleados` WHERE code ='".$_SESSION['user']."' "));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Jornadas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css" />
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">Control Ctr Cost</a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Add works<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="myworks.php">My Works</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-id="<?php echo $_SESSION['user']?>" id="change" >Change my Password</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="php/destroy.php">Logout</a>
                </li>

            </ul>
        </div>
    </nav>

    <div class="p-4">
        <div class="card text-center">
            <div class="card-header">
                Current Workday Date : <b><span id="fecha"></span></b> 
                Welcome: <b><?php echo $row[0] ?> </b>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <tfoot>
                            <tr >
                                <td colspan="3" id="botones">
                                    <button class="btn btn-success" id="newbtn">Add new project</button>
                                </td>
                            </tr>
                        </tfoot>
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Project in progress</th>
                                <th><span class="text-truncate">Start/End Hours</span></th>
                            </tr>
                        </thead>
                        <form>
                            <tbody id="turno">

                            </tbody>
                        </form>
                    </table>
                </div>
            </div>
            <div class="card-footer text-muted">
                <p>
                    Instructions: You must select the project and entry time, then the departure time. By default the
                    current time is selected. Please don't forget to finish the process</p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="js/empleados.js"></script>
    <script> brProyectoToLocalS() </script>
</body>

</html>
<?php 
} else { 
    header("location:php/destroy.php");
}
?>