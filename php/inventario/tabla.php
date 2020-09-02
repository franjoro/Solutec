<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Código</th>
            <th>Descripción</th>
            <th>Precio Unidad</th>
            <th>Stock</th>
            <th>Proveedor</th>
            <th>Acción</th>
            <th>Imagen</th>
        </tr>
    </thead>
    <tbody>
        <?php
    require_once("../conexion.php");
    $sql = "SELECT tb_inventario.code, tb_inventario.name, tb_inventario.codeP, tb_inventario.descripcion, tb_inventario.cantidad, tb_inventario.precio, tb_proveedores.name , tb_inventario.foto FROM tb_inventario INNER JOIN tb_proveedores ON tb_proveedores.code = tb_inventario.codeProovedor ";
    $query = mysqli_query($mysqli, $sql);
    echo mysqli_error($mysqli);
    while ($row = mysqli_fetch_array($query)) {
       $code = $row[0];
    ?>
        <tr>
            <td data-columna="name" data-tabla="tb_inventario" data-code="<?php echo $code?>"><?php echo $row[1] ?></td>
            <td data-columna="codeP" data-tabla="tb_inventario" data-code="<?php echo $code?>"><?php echo $row[2] ?>
            </td>
            <td data-columna="descripcion" data-tabla="tb_inventario" data-code="<?php echo $code?>">
                <?php echo $row[3] ?></td>
            <td data-columna="precio" data-tabla="tb_inventario" data-code="<?php echo $code?>"><?php echo $row[5] ?>
            </td>
            <td data-tabla="NotEditable"><?php echo $row[4] ?></td>
            <td data-tabla="NotEditable"><?php echo $row[6] ?></td>
            <td data-tabla="action">
                <button class="btn" onclick="addI('<?php echo $code ?>', '<?php echo $row[1] ?> ',' <?php echo $row[4] ?>' , 'php/inventario/<?php echo $row[7]?> ' )"><i class="far fa-plus-square"></i></button>
                <button class="btn" onclick="ResI('<?php echo $code ?>', '<?php echo $row[1] ?> ',' <?php echo $row[4] ?>' , 'php/inventario/<?php echo $row[7]?> ' )"><i class="far fa-minus-square"></i></button> 
                <button class="btn" onclick="eliminar(<?php echo $code ?>)" ><i class="fas fa-trash"></i></button>
            </td>
            <td data-tabla="NotEditable" data-code="<?php echo $code?>">
                <img src="php/inventario/<?php echo $row[7]?> " style="width:120px" alt="">
            </td>
        </tr>
        <?php
    }
    mysqli_close($mysqli);
    ?>
    </tbody>
</table>