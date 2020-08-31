<?php
session_start();
if (isset($_SESSION['user'])) {
    session_destroy();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar sesión **</title>
    <!-- CSS -->
    <link rel="stylesheet" href="css/form-elements.css">
    <link rel="stylesheet" href="css/styleLogin.css">

    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


</head>

<body class="w3-animate-opacity">
    <style type="text/css">
    body {
        font-family: 'Roboto', sans-serif;
        font-size: 16px;
        font-weight: 300;
        color: #888;
        line-height: 30px;
        text-align: center;
        background: url('https://images.unsplash.com/photo-1508873699372-7aeab60b44ab?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80');
        background-position: top;
        background-repeat: no-repeat;
        background-size: 100% 100%;
        background-attachment: fixed;
        overflow: hidden;
    }
    </style>
    <!-- Top content -->
    <div class="top-content">
        <div class="inner-bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-sm-offset-3 form-box">
                        <div class="form-top">
                            <div class="form-top-left d-none d-lg-block">
                                <strong>
                                    <h3>¡Bienvenido!</h3>
                                    <h6>Rellena la información para continuar</h6>
                                </strong>
                            </div>
                            <div class="form-top-right d-none d-lg-block">
                                <img src="img/logo.png">
                            </div>
                            <div class="d-lg-none" style="text-align: center;">
                                    <img height="145px;" src="img/logo.png">
                            </div>
                        </div>
                        <div class="form-bottom">
                            <form id="userForm">
                                <div class="form-group">
                                    <input type="text" name="pin" placeholder="Usuario" class="form-username form-control"
                                        id="form-username">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="pass" placeholder="Contraseña"
                                        class="form-password form-control" id="form-password" autocomplete>
                                </div>
                                <button style="width: 100%" type="submit" id="sub" class="btn">Iniciar</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script>
    const badpass = () => {
        Swal.fire({
            icon: "error",
            title: "User / pass wrong",
            text: "Please contact with the administrator",
        });
    };

    $("#userForm").submit((event) => {
        event.preventDefault();
        const serializedData = $("#userForm").serialize();
        $.ajax({
            url: "php/login.php",
            data: serializedData,
            type: "POST",
        }).done((data) => {
            console.log(data)
            if (data === 'NotAccess') {
                return badpass()
            };
            if (data === 'ok') {
                return window.location.href = 'dashboard.php'
            };
        });
    });
    </script>
</body>

</html>