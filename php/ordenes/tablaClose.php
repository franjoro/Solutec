<table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Cliente</th>
            <th>Tecnico</th>
            <th>Fecha</th>
            <th>Tipo de pago</th>
            <th>Árticulo</th>
            <th>U. Tecnico</th>
            <th>U. Neta</th>
            <th>Detalle</th>
        </tr>
    </thead>
    <tbody>
        <?php

    $start =  $_GET['start'];
    $end =  $_GET['end'];
    $articulo =  $_GET['articulo'];
    $pago =  $_GET['pago'];

    require_once("../conexion.php");
    $sql = "SELECT  tb_clientes.name  ,tb_tecnico.nombre, tb_ordendata.date , tb_ordenmain.UNeta , tb_ordenmain.UTec , tb_ordenmain.code , tb_ordendata.articulo, tb_ordenmain.tipoPago  FROM `tb_ordenmain`INNER JOIN tb_clientes ON tb_ordenmain.codeCliente = tb_clientes.code INNER JOIN tb_tecnico ON tb_ordenmain.tecCode = tb_tecnico.code INNER JOIN tb_ordendata ON tb_ordenmain.code =  tb_ordendata.codeOrden WHERE tb_ordenmain.status = 0 AND tb_ordendata.date BETWEEN '".$start."' AND '".$end."' ";
    if($articulo != "All"){
        $sql .= "AND tb_ordendata.articulo = '$articulo' ";
    }
    if($pago != "All"){
        $sql .= "AND tb_ordenmain.tipoPago = $pago ";
    }
    $query = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($query)) {
        if($row['7'] == "1"){
            $pago = "Recibo";
        }
        if($row['7'] == "2"){
            $pago = "Crédito Fiscal";
        }
        if($row['7'] == "3"){
            $pago = "Factura";
        }     
    ?>
        <tr>
            <td><?php echo $row[0] ?></td> 
            <td><?php echo $row[1] ?></td>
            <td><?php echo $row[2] ?></td>
            <td><?php echo $pago ?></td>
            <td><?php echo $row[6] ?></td>
            <td><?php echo $row[4] ?></td>
            <td><?php echo $row[3] ?></td>
            <td><a href="detalle.php?id=<?php echo $row[5] ?>"><button>Ver a detalle </button> </a></td>
        </tr>
        <?php
    }
    mysqli_close($mysqli);
    ?>
    </tbody>
</table>