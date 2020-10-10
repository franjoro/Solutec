<table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Cliente</th>
            <th>Tecnico</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th>Acción</th>
            <th>Cambiar estado</th>
        </tr>
    </thead>
    <tbody>
        <?php
    require_once("../conexion.php");
    $sql = "SELECT  tb_clientes.name  ,tb_tecnico.nombre, tb_ordendata.date ,tb_ordenmain.status, tb_ordenmain.code  FROM `tb_ordenmain`INNER JOIN tb_clientes ON tb_ordenmain.codeCliente = tb_clientes.code INNER JOIN tb_tecnico ON tb_ordenmain.tecCode = tb_tecnico.code INNER JOIN tb_ordendata ON tb_ordenmain.code =  tb_ordendata.codeOrden WHERE tb_ordenmain.status != 0";
    $query = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($query)) {
      if($row[3] == 1){
        $estado= "Abierta";
      }
      if($row[3] == 2){
        $estado= "Pendiente de pago";
      }
      if($row[3] == 3){
        $estado= "Pendiende de confirmación";
      }
    ?>
        <tr>
            <td><?php echo $row[0] ?></td>
            <td><?php echo $row[1] ?></td>
            <td><?php echo $row[2] ?></td>
            <td><?php echo $estado ?></td>
            <td>
                <button class="btn" onclick="borrar(<?php echo $row[4]?>)"><i class="fas fa-trash"></i></button>
                <a href="editOrdenes.php?id=<?php echo $row[4]?>"> <button class="btn"><i class="far fa-edit"></i></button></a>
            </td>
            <td>
                <button class="btn" onclick="ChangeS(<?php echo $row[4]?>)" ><i class="fas fa-paperclip"></i></button>
            </td>
        </tr>
        <?php
    }
    mysqli_close($mysqli);
    ?>
    </tbody>
</table>