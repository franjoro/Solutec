<?php
require_once("../conexion.php");
$id = $_GET['id'];
if($_GET['op'] == 1){
    $sql = "SELECT `tb_ordenmain`.`codeCliente`, `tb_ordenmain`.`tecCode`, `tb_ordenmain`.`precio`, `tb_ordenmain`.`UNeta`, `tb_ordenmain`.`UTec`, `tb_ordenmain`.`iva`, `tb_ordenmain`.`status`, `tb_ordendata`.`work`, `tb_ordendata`.`articulo`, `tb_ordendata`.`marca`, `tb_ordendata`.`date`, `tb_ordendata`.`falla`, `tb_ordenmain`.`codFactura`, `tb_ordenmain`.`tipoPago` FROM `tb_ordenmain` LEFT JOIN `tb_ordendata` ON `tb_ordendata`.`codeOrden` = `tb_ordenmain`.`code` WHERE tb_ordenmain.code= '".$id."' ; ";

    $query = mysqli_query($mysqli,$sql);
    $row = mysqli_fetch_assoc($query);
    echo mysqli_error($mysqli);
    echo json_encode($row);
}if($_GET['op'] == 2){
    $sql = "SELECT tb_inventario.name, tb_ordenmateriales.codeInventario, tb_ordenmateriales.cantidad, tb_ordenmateriales.total , tb_inventario.precio ,tb_ordenmateriales.code FROM tb_ordenmateriales LEFT JOIN tb_inventario ON tb_inventario.code =  tb_ordenmateriales.codeInventario   WHERE tb_ordenmateriales.codeOrden= '".$id."' ";
    $query = mysqli_query($mysqli,$sql);
    $columns = array();
   while ($row = mysqli_fetch_array($query)) {
    $columns[] = array('nameProducto' => $row[0],'codeInve' => $row[1],'cantidad' => $row[2],'total' => $row[3],'preciou' => $row[4],'code' => $row[5]);
   };
   echo json_encode($columns);
}
