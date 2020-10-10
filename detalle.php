<?php
    include("./php/conexion.php");
    $id = $_GET['id'];
    $sql = "SELECT
    tb_clientes.name,
    tb_clientes.address,
    tb_clientes.teloffice,
    tb_ordenmain.codFactura,
    tb_ordendata.date,
    tb_ordendata.work,
    tb_ordendata.articulo,
    tb_ordendata.falla,
    tb_ordendata.marca
FROM
    tb_ordenmain
INNER JOIN tb_ordendata ON tb_ordendata.codeOrden = tb_ordenmain.code
INNER JOIN tb_clientes ON  tb_ordenmain.codeCliente = tb_clientes.code WHERE tb_ordenmain.code = '".$id."'";
$row = mysqli_fetch_array(mysqli_query($mysqli,$sql));

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/detalle.css">
<meta name="viewport" content="width=device-width, initial-scale=1">


<div id="invoice">
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <img src="img/logo.png" style="width: 250px;" data-holder-rendered="true" />
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">Orden para:</div>
                        <h2 class="to"><?php echo $row[0]?></h2>
                        <div class="address">
                            <?php echo $row[1]?>
                        </div>
                        <div class="address">Tel:<?php echo $row[2]?> </div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id"><?php echo $row[3]?></h1>
                        <div class="date">Fecha: <?php echo $row[4]?></div>
                    </div>
                </div>
                <div class="container">
                    <table border="0" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th class="text-left">Concepto</th>
                                <th class="text-right">Descripción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="no">Trabajo hecho</td>
                                <td class="qty"><?php echo $row[5]?></td>
                            </tr>
                            <tr>
                                <td class="no">Árticulo</td>
                                <td class="qty"><?php echo $row[6]?></td>
                            </tr>
                            <tr>
                                <td class="no">Marca</td>
                                <td class="qty"><?php echo $row[8]?></td>
                            </tr>
                            <tr>
                                <td class="no">Falla detectada</td>
                                <td class="qty"><?php echo $row[7]?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>
            <footer>
                Detalle de orden generada automaticamente
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>