
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Teléfono</th>
      <th>Teléfono Emergencia</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
    require_once("../conexion.php");
    $sql = "SELECT * FROM tb_tecnico ";
    $query = mysqli_query($mysqli, $sql);
    echo mysqli_error($mysqli);
    while ($row = mysqli_fetch_array($query)) {
       $code = $row[0];
    ?>
      <tr>
        <td data-columna="nombre" data-tabla="tb_tecnico" data-code="<?php echo $code?>"><?php echo $row[1] ?></td>
        <td data-columna="tel" data-tabla="tb_tecnico" data-code="<?php echo $code?>"><?php echo $row[2] ?></td>
        <td data-columna="telemer" data-tabla="tb_tecnico" data-code="<?php echo $code?>"><?php echo $row[3] ?></td>
        <td data-tabla="delete" data-code="<?php echo $code?>">
          <button class="btn"><i class="fas fa-trash"></i></button>
        </td>
      </tr>
    <?php
    }
    mysqli_close($mysqli);
    ?>
  </tbody>
</table>