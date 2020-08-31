<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Operación</th>
            <th>Monto</th>
            <th>Concepto</th>
            <th>Nuevo Saldo</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
        <?php
    require_once("../conexion.php");
    $sql = "SELECT * FROM tb_cajamovimiento WHERE Date BETWEEN '".$_GET['start']."' AND '".$_GET['end']."' ORDER BY code DESC";
    $query = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($query)) {
      $code = $row[0];
      $ope = $row[3];
      if($ope == 1){
        $color = "red";
        $opT = "Deducción";
      }else{
        $opT = "Deposito";
        $color = "green";
      }
    ?>
        <tr>
            <td data-tabla="NotEditable" style="color:<?php echo $color?>"  ><?php echo $opT ?></td>
            <td data-tabla="NotEditable" ><?php echo "$".number_format($row[2],2) ?></td>
            <td data-tabla="NotEditable"><?php echo $row[4] ?></td>
            <td data-tabla="NotEditable"><?php echo "$".number_format($row[5],2) ?></td>
            <td data-tabla="NotEditable"><?php echo $row[6] ?></td>
        </tr>
        <?php
    }
    mysqli_close($mysqli);
    ?>
    </tbody>
</table>