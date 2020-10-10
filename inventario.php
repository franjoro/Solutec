<?php
session_start();
if (isset($_SESSION['user'])) {
    include("./php/conexion.php")
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet" />
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
                        <a class="collapse-item " href="ordenes.php">Nueva orden</a>
                        <a class="collapse-item" href="showOrdenes.php">Ordenes abiertas</a>
                        <a class="collapse-item" href="CloseOrdenes.php">Historial de ordenes</a>
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
                        <a class="collapse-item" href="tecnicos.php">Administrar técnicos</a>
                        <a class="collapse-item" href="planilla.php">Ver planilla</a>
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
                    <h1 class="h3 mb-4 text-gray-800">Inventario</h1>



                    <div class="row">
                        <!-- Content Column -->
                        <div class="col-lg-3 mb-4">
                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Agregar nuevo producto</h6>

                                </div>
                                <div class="card-body">
                                    <form id="inventarioForm" enctype="multipart/form-data">

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputAddress">Nombre *</label>
                                                <input type="text" required class="form-control form-control-sm"
                                                    id="name" name="name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputAddress">Código </label>
                                                <input type="text" class="form-control form-control-sm" id="co"
                                                    name="codigo">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputAddress2">Descripción</label>
                                            <textarea class="form-control form-control-sm"
                                                name="descripcion"></textarea>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="inputEmail4">Precio Unidad</label>
                                                <input type="text" class="form-control form-control-sm" value="0"
                                                    name="precio" id="precio">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputPassword4">Stock Inicial</label>
                                                <input type="number" step="1" class="form-control form-control-sm"
                                                    value="1" name="cantidad">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputAddress">Proveedor</label>
                                                <select name="op" required class="form-control form-control-sm">
                                                    <option disabled selected>Seleccionar Proveedor</option>
                                                    <?php
                                                  $query=mysqli_query($mysqli, "SELECT code, name FROM tb_proveedores");
    while ($row = mysqli_fetch_array($query)) {
        ?>
                                                    <option value="<?php echo $row[0]?>"><?php echo $row[1]?>
                                                    </option>
                                                    <?php
    } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputAddress2">Seleccionar Imagen</label>
                                                <input type="file" name="imagen" id="imagen">
                                            </div>
                                        </div>
                                        <button id="New_button" type="submit"
                                            class="btn btn-primary visible">Insert</button>
                                    </form>

                                    <button id="loader" class="btn btn-primary invisible" disabled>
                                        <span class="spinner-border spinner-border-sm" id="loader" role="status"
                                            aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 mb-4">
                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        Inventario
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div id="clientInventario"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Approach -->
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

    <!-- Modals -->
    <form id="FormModalSumar">

        <!-- Modal Suma -->
        <div class="modal fade" id="modalSuma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Stock Código: <span id="MScode"></span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img style="width:150px" id="SMImagen">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="inputAddress">Producto</label>
                                <input type="text" disabled class="form-control form-control-sm" id="MSproducto"
                                    name="MSproducto">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputAddress">Operación</label>
                                <input type="text" class="form-control form-control-sm text-success"
                                    value="Agregar Stock" disabled id="MSoperacion" name="MSoperacion">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputAddress">Fecha </label>
                                <input type="text" class="form-control form-control-sm" id="MsDate" name="MsDate">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="inputAddress2">Concepto</label>
                                <textarea class="form-control form-control-sm" rows="1" name="MSConcepto"
                                    id="MSConcepto"></textarea>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPassword4">Cantidad a sumar</label>
                                <input type="number" step="1" min="1" required pattern="^[0-9]+"
                                    class="form-control form-control-sm" value="0" name="MSCantidadToS"
                                    id="MSCantidadToS">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputAddress">Actual</label>
                                <input type="text" disabled class="form-control form-control-sm" id="MSActual"
                                    name="MSActual">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputAddress">Nueva Cantidad</label>
                                <input type="text" disabled class="form-control form-control-sm" value="0"
                                    id="MsNewCantidad" name="MsNewCantidad">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <form id="FormModalRestar">

        <!-- Modal Suma -->
        <div class="modal fade" id="modalResta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Disminuir Stock Código: <span id="RScode"></span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img style="width:150px" id="RMImagen" >
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="inputAddress">Producto</label>
                                <input type="text" disabled class="form-control form-control-sm" id="RSproducto"
                                    name="RSproducto">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputAddress">Operación</label>
                                <input type="text" class="form-control form-control-sm text-danger"
                                    value="Disminuir Stock" disabled id="RSoperacion" name="RSoperacion">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputAddress">Fecha </label>
                                <input type="text" class="form-control form-control-sm" id="RsDate" name="RsDate">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="inputAddress2">Concepto</label>
                                <textarea class="form-control form-control-sm" rows="1" name="RSConcepto"
                                    id="RSConcepto"></textarea>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPassword4">Cantidad a restar</label>
                                <input type="number" step="1" min="1" required pattern="^[0-9]+"
                                    class="form-control form-control-sm" value="0" name="RSCantidadToS"
                                    id="RSCantidadToS">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputAddress">Actual</label>
                                <input type="text" disabled class="form-control form-control-sm" id="RSActual"
                                    name="RSActual">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputAddress">Nueva Cantidad</label>
                                <input type="text" disabled class="form-control form-control-sm" value="0"
                                    id="RsNewCantidad" name="RsNewCantidad">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js">
    </script>

    <!-- Page level custom scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="js/request_handler.js"></script>
    <script src="js/jquery.mask.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
        integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>

    <script>
    $("#clientInventario").on("click", "tbody td", function() {
        const e = $(this).data();
        return "action" === e.tabla ?
            null :
            "restart" === e.tabla ?
            restartPassword(e.code) :
            "NotEditable" === e.tabla ?
            NotEditable() :
            void Swal.fire({
                title: "Edit cell",
                text: "You will edit a cell this will be reflected in the reporting information ",
                input: "text",
                inputValue: $(this).text(),
                icon: "info",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, edit it!",
            }).then((t) => {
                t.value &&
                    $.ajax({
                        url: "php/edit.php",
                        data: {
                            tabla: e.tabla,
                            columna: e.columna,
                            campo: t.value,
                            code: e.code,
                        },
                        type: "POST",
                    }).done((e) => {
                        AlertaExito(), tablaInventario();
                    });
            });
        var t;
    });
    $("#inventarioForm").submit( async function(e) {
        e.preventDefault();
        const t = $(this).serialize();
        const frmData = new FormData;
        frmData.append("imagen",$("input[name=imagen]")[0].files[0]);


       const pathImage = await $.ajax({
            url: "php/inventario/insertImg.php",
            type: "post",
            data: frmData,
            processData: false,
            contentType: false 
        })
     
        $.ajax({
                url: `php/inventario/insert.php?imageP=${pathImage}`,
                type: "post",
                data: t,
                beforeSend: () => {
                    $("#New_button").css("display", "none");
                    $("#loader").removeClass("invisible").addClass("visible");
                },
            })
            .done(function(e) {
                console.log(e);
                tablaInventario(),
                    AlertaExito(),
                    $("#New_button").css("display", "block"),
                    $("#loader").removeClass("visible").addClass("invisible"),
                    $("#inventarioForm")[0].reset();
            })
            .fail(function(e, t, o) {
                AlertaFallido();
            });
    });
    const tablaInventario = () => {
        $.ajax({
            url: "php/inventario/tabla.php"
        }).done(function(e) {
            $("#clientInventario").html(e), $("#dataTable").DataTable();
        });
    };
    tablaInventario();



    $("#precio").mask("000,000,000,000,000.00", {
        reverse: !0
    });

    const eliminar = (t) => {
        void Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this! ID ctz: " + t,
            icon: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((e) => {
            if (e.value) {
                const e = new Promise((e, o) => {
                    $.ajax({
                        url: "php/inventario/eliminar.php?id=" + t
                    }).done(() => {
                        e();
                    });
                });
                Promise.all([e]).then(
                    Swal.fire(
                        "Deleted!",
                        "Your file has been deleted.",
                        "success"
                    ).then(() => {
                        tablaInventario();
                    })
                );
            }
        })
    }
    const addI = (code, nameP, actual, img) => {
        $("#MSproducto").val(nameP);
        $("#MSActual").val(actual);
        $("#MScode").text(code);
        $("#SMImagen").attr("src",img);
        $('#modalSuma').modal('show');
        $("#MsDate").datepicker({
            dateFormat: "mm/dd/yy"
        });


        $("#modalSuma").on("change", "#MSCantidadToS", function() {
            $("#MsNewCantidad").val(Number($(this).val()) + Number($("#MSActual").val()));
        })
    }

    const ResI = (code, nameP, actual, img) => {
        $("#RSproducto").val(nameP);
        $("#RSActual").val(actual);
        $("#RScode").text(code);
        $("#RMImagen").attr("src",img);
        $('#modalResta').modal('show');
        $("#RsDate").datepicker({
            dateFormat: "mm/dd/yy"
        });
        $("#modalResta").on("change", "#RSCantidadToS", function() {
            $("#RsNewCantidad").val(Number($("#RSActual").val() - Number($(this).val())));
        })
    }




    $("#FormModalRestar").submit(function(e) {
        e.preventDefault();
        const t = $(this).serialize(),
            code = $("#RScode").text();
        loader();
        $('#modalResta').modal('hide');
        $.ajax({
                url: "php/inventario/insertSuma.php?code=" + code + "&op=0",
                type: "post",
                data: t
            })
            .done(function(e) {
                console.log(e);
                tablaInventario();
                swal.close();
                $('#FormModalRestar')[0].reset();
            })
            .fail(function(e, t, o) {
                AlertaFallido();
            });
    });



    $("#FormModalSumar").submit(function(e) {
        e.preventDefault();
        const t = $(this).serialize(),
            code = $("#MScode").text();
        loader();
        $('#modalSuma').modal('hide');
        $.ajax({
                url: "php/inventario/insertSuma.php?code=" + code + "&op=1",
                type: "post",
                data: t
            })
            .done(function(e) {
                console.log(e);
                tablaInventario();
                swal.close();
                $('#FormModalSumar')[0].reset();
            })
            .fail(function(e, t, o) {
                AlertaFallido();
            });
    });
    </script>
</body>

</html>
<?php
} else {
        header("location:php/destroy.php");
    }
?>