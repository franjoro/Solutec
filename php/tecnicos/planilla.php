<table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Cliente</th>
            <th>Técnico</th>
            <th>Utilidad</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
        <?php
    require_once("../conexion.php");
    $sql = "SELECT
    tb_clientes.name,
    tb_tecnico.nombre,
    tb_ordenmain.UTec,
    tb_ordendata.date
FROM
    tb_ordenmain
INNER JOIN tb_clientes ON tb_clientes.code = tb_ordenmain.codeCliente
INNER JOIN tb_tecnico ON tb_tecnico.code = tb_ordenmain.tecCode
INNER JOIN tb_ordendata ON tb_ordendata.codeOrden = tb_ordenmain.code
WHERE tb_ordenmain.status = 0 AND tb_ordendata.date BETWEEN  '".$_GET['start']."' AND '".$_GET['end']."' ";

$tec=$_GET['tec'];
if($tec != "All"){
  $sql .= " AND tb_ordenmain.tecCode =".$tec;
}
  $total = 0;
    $query = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($query)) {
      $total =$total +substr($row[2], 1);
    ?>
        <tr>
            <td><?php echo $row[0] ?></td>
            <td><?php echo $row[1] ?></td>
            <td><?php echo $row[2] ?></td>
            <td><?php echo $row[3] ?></td>

        </tr>
        <?php
    }
    mysqli_close($mysqli);
    ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3">
              <p class="text-right">Total Bruto: $<?php echo number_format($total,2)?></p>
            </td>
            <td>
                <p class="text-right">10% renta : $<?php echo number_format( ( $total - ($total*10 )/100) ,2)?></p>
            </td>
        </tr>
    </tfoot>
</table>