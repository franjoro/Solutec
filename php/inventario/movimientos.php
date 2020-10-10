<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Operación</th>
            <th>Concepto</th>
            <th>Fecha</th>
            <th>Cantidad</th>
        </tr>
    </thead>
    <tbody>
        <?php
    require_once("../conexion.php");
    $sql = "SELECT tb_inventario.name , tb_inventariomovimiento.op, tb_inventariomovimiento.concepto , tb_inventariomovimiento.date,  tb_inventariomovimiento.cantidad FROM tb_inventariomovimiento INNER JOIN tb_inventario ON tb_inventario.code = tb_inventariomovimiento.codePro WHERE Date BETWEEN '".$_GET['start']."' AND '".$_GET['end']."'  " ;
    echo mysqli_error($mysqli);
    $query = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($query)) {
      $code = $row[0];

      $ope = $row[1];
      if($ope == 1){
        $color = "green";
        $opT = "Adición";
      }if($ope == 0){
        $opT = "Disminución";
        $color = "red";
      }if($ope == 2){
        $opT = "Ocupado en Orden";
        $color = "black";
      }
    ?>
        <tr>
            <td data-tabla="NotEditable"><?php echo $row[0] ?></td>
            <td data-tabla="NotEditable" style="color:<?php echo $color?>"  ><?php echo $opT ?></td>
            <td data-tabla="NotEditable" ><?php echo $row[2] ?></td>
            <td data-tabla="NotEditable"><?php echo $row[3] ?></td>
            <td data-tabla="NotEditable"><?php echo $row[4] ?></td>
        </tr>
        <?php
    }
    mysqli_close($mysqli);
    ?>
    </tbody>
</table>