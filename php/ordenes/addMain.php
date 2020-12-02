<?php
require_once("../conexion.php");

if ($_GET['id'] == 1) {
    $cliente = $_POST['cliente'];
    $precio = $_POST['precio'];
    $tecnico = $_POST['tecnico'];
    $uNeta = $_POST['uNeta'];
    $factura = $_POST['factura'];
    $pago = $_POST['pago'];
    $uTec = $_POST['UTec'];
    $iva = $_POST['iva'];
    $estado = $_POST['estado'];
    $porcentaje = $_POST['porcentaje'];
    $sql = mysqli_query($mysqli, "INSERT INTO tb_ordenMain(codeCliente,precio,tecCode,UNeta,UTec,iva,codFactura,tipoPago,status,tec_porcentaje) VALUES (
        '" . $cliente . "', 
        '" . $precio . "', 
        '" . $tecnico . "', 
        '" . $uTec . "', 
        '" . $uNeta . "', 
        '" . $iva . "', 
        '" . $factura . "', 
        '" . $pago . "', 
        '" . $estado . "',
        '" . $porcentaje . "'
         )");
    echo mysqli_error($mysqli);
    echo mysqli_insert_id($mysqli);
}
if ($_GET['id'] == 2) {
    $trabajo = $_POST['trabajo'];
    $articulo = $_POST['articulo'];
    $marca = $_POST['marca'];
    $date = $_POST['date'];
    $falla = $_POST['falla'];
    $id = $_POST['query1'];



    $sql = mysqli_query($mysqli, "INSERT INTO tb_ordendata(codeOrden,work,articulo,marca,date,falla) VALUES (
        '" . $id . "', 
        '" . $trabajo . "', 
        '" . $articulo . "', 
        '" . $marca . "', 
        '" . $date . "', 
        '" . $falla . "'
         )");


    echo mysqli_error($mysqli);
}
if ($_GET['id'] == 3) {
    $myArray = $_REQUEST['data'];
    $sql = "INSERT INTO tb_ordenmateriales(codeOrden,codeInventario,cantidad,total) VALUES ";
    $sqlMovimiento = "INSERT INTO tb_inventariomovimiento(codePro,op,concepto,date,cantidad) VALUES ";
    $sqlUpdate ="";

    foreach($myArray as $value){
        $sql .= "('".$_GET['code']."', '".$value['code']."', '".$value['cantidad']. "', '".$value['total']. "'),";
        $sqlMovimiento .= "('".$value['code']."', '2', 'Orden ".$_GET['cliente']."', '".$_GET['date']. "' , '".$value['cantidad']. "'),";
        $sqlUpdate .= "UPDATE tb_inventario SET cantidad= cantidad-".$value['cantidad']." WHERE code=".$value['code'].";";
    }
    $sql =  substr($sql, 0, -1);
    $sqlMovimiento =  substr($sqlMovimiento, 0, -1);
    $sql = $sql."; ".$sqlMovimiento.";".$sqlUpdate;
    echo $sql;
    mysqli_multi_query($mysqli,$sql);
    echo mysqli_error($mysqli);
}