<?php
session_start();
if (isset($_SESSION['user'])) {
    include("./php/conexion.php");
    $clientesSql = mysqli_query($mysqli,"SELECT code, name FROM tb_clientes");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Project Manager</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon ">
                    <i class="fas fa-tools"></i>
                </div>
                <div class="sidebar-brand-text mx-1">Solutec Express</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0" />
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider" />
            <!-- Heading -->
            <div class="sidebar-heading">
                Administración
            </div>
            <li class="nav-item ">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-briefcase"></i>
                    <span>Ordenes</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Ordenes</h6>
                        <!-- <a class="collapse-item " href="proyectos.php">Project management</a>
                        <a class="collapse-item" href="materiales.php">Purchase management</a>
                        <a class="collapse-item" href="reportes.php">Employees Reports</a>-->
                        <a class="collapse-item" href="">En Construcción</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <li class="nav-item  ">
                <a class="nav-link" href="cajachica.php">
                    <i class="fas fa-file-invoice-dollar"></i>
                    <span>Caja Chica</span></a>
            </li>
            <hr class="sidebar-divider" />

            <!-- Heading -->
            <div class="sidebar-heading">
                Data Previa
            </div>
            <!-- Nav Item - Charts -->
            <li class="nav-item ">
                <a class="nav-link" href="clientes.php">
                    <i class="fas fa-user-tie"></i>
                    <span>Clientes</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInve"
                    aria-expanded="true" aria-controls="collapseInve">
                    <i class="fas fa-building"></i>
                    <span>Inventario</span>
                </a>
                <div id="collapseInve" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Inventario</h6>
                        <a class="collapse-item" href="inventario.php">Administración de inventario</a>
                        <a class="collapse-item" href="inventarioM.php">Movimientos del inventario</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item ">
                <a class="nav-link" href="providers.php">
                    <i class="fas fa-boxes"></i>
                    <span>Proovedores</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block" />
            <div class="sidebar-heading">
                Empleados
            </div>
            <li class="nav-item ">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-users-cog"></i>
                    <span>Tecnicos</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Administrar</h6>
                        <a class="collapse-item" href="">En Construcción</a>
                    </div>
                </div>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-chevron-circle-down"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">


                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Contactar con el programador
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar sesión
                                </a>
                            </div>
                        </li>


                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Administrador</span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">


                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Contactar con el programador
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar sesión
                                </a>
                            </div>
                        </li>




                    </ul>
                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Agregar nueva orden</h1>
                    <div class="row">
                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">
                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <!-- <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Nuevo movimiento </h6>
                                </div> -->
                                <div class="card-body">

                                    <p>1) Cliente:</p>
                                    <div class="card shadow mb-4">
                                        <div class="card-body">

                                            <form id="CajaChicaForm">
                                                <div class="form-group ">

                                                
                                                    <label for="inputEmail4">Seleccionar cliente</label>
                                                    <select name="op" required class="form-control form-control-sm selectClientes">
                                                        <option disabled selected>Seleccionar Cliente</option>
                                                        <?php while($row = mysqli_fetch_array($clientesSql)){?>
                                                        <option value="<?php echo $row[0]?>" class="text-primary"><?php echo $row[1]?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                            </form>
                                        </div>
                                    </div>


                                    <p>2) Información del artículo</p>

                                    <div class="card shadow mb-4">
                                        <div class="card-body">

                                            <form id="CajaChicaForm">

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="inputAddress">Trabajo Realizado</label>
                                                            <textarea type="text" required
                                                                class="form-control form-control-sm" id="concepto"
                                                                name="concepto" rows="1"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="inputEmail4">Artículo</label>
                                                                <select name="op" required
                                                                    class="form-control form-control-sm">
                                                                    <option disabled selected>Seleccionar artículo
                                                                    </option>
                                                                    <option value="A/C">A/C</option>
                                                                    <option value="Secadora">Secadora</option>
                                                                    <option value="Freezer">Freezer</option>
                                                                    <option value="Camara Refrigerante">Camara
                                                                        Refrigerante</option>
                                                                    <option value="Cocina">Cocina</option>
                                                                    <option value="Lavadora">Lavadora</option>
                                                                    <option value="Oasis">Oasis</option>
                                                                    <option value="Otro">Otro</option>

                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="inputAddress">Marca</label>
                                                                <input type="text" required
                                                                    class="form-control form-control-sm" id="datepicker"
                                                                    name="date">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <!-- 
                                                <button id="New_button" type="submit"
                                                    class="btn btn-primary visible float-right">Agregar</button> -->
                                            </form>
                                        </div>
                                    </div>





                                    <button id="loader" class="btn btn-primary invisible float-right" disabled>
                                        <span class="spinner-border spinner-border-sm" id="loader" role="status"
                                            aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <!-- <span>Copyright &copy; Your Website 2019</span> -->
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="php/destroy.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script>
    $(document).ready(function() {
        $('.selectClientes').select2();
    })
    </script>
</body>

</html>
<?php
} else {
    header("location:php/destroy.php");
}
?>