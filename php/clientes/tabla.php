<table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Contacto</th>
      <th>Email</th>
      <th>Dirección</th>
      <th>Teléfono</th>
      <th>Tel. Otro</th>
      <th>Notas</th>
      <th>Eliminar</th>
    </tr>
  </thead>
  <tbody>
    <?php
    require_once("../conexion.php");
    $sql = "SELECT code,name,contact,teloffice,email,notes,address,telother FROM tb_clientes WHERE code !='0'";
    $query = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($query)) {
      $code = $row[0];
    ?>
      <tr>
        <td data-columna="name" data-tabla="tb_clientes"   data-code="<?php echo $code?>"   ><?php echo $row[1] ?></td>
        <td data-columna="contact" data-tabla="tb_clientes"   data-code="<?php echo $code?>"   ><?php echo $row[2] ?></td>
        <td data-columna="email" data-tabla="tb_clientes"   data-code="<?php echo $code?>"   ><?php echo $row[4] ?></td>
        <td data-columna="address" data-tabla="tb_clientes"   data-code="<?php echo $code?>"   ><?php echo $row[6] ?></td>
        <td data-columna="teloffice" data-tabla="tb_clientes"   data-code="<?php echo $code?>"   ><?php echo $row[3] ?></td>
        <td data-columna="telother" data-tabla="tb_clientes"   data-code="<?php echo $code?>"   ><?php echo $row[7] ?></td>
        <td data-columna="notes" data-tabla="tb_clientes"   data-code="<?php echo $code?>"   ><?php echo $row[5] ?></td>
        <td data-tabla="delete" data-code="<?php echo $code?>">
          <button class="btn" ><i class="fas fa-trash"></i></button>
        </td>
      </tr>
    <?php
    }
    mysqli_close($mysqli);
    ?>
  </tbody>
</table>