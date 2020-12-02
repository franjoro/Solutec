<?php
require_once("../conexion.php");

if ($_GET['id'] == 1) {
    $cliente = $_POST['cliente'];
    $precio = $_POST['precio'];
    $tecnico = $_POST['tecnico'];
    $uNeta = $_POST['uNeta'];
    $uTec = $_POST['UTec'];
    $iva = $_POST['iva'];
    $estado = $_POST['estado'];
    $factura = $_POST['factura'];
    $pago = $_POST['pago'];
    $porcentaje = $_POST['porcentaje'];

    $sql = "UPDATE tb_ordenMain
    SET 
    codeCliente = '" . $cliente . "', 
    precio = '" . $precio . "', 
    tecCode = '" . $tecnico . "', 
    UNeta =  '" . $uTec . "', 
    UTec = '" . $uNeta . "', 
    codFactura = '" . $factura . "', 
    tipoPago = '" . $pago . "', 
    iva = '" . $iva . "', 
    status = '" . $estado . "',
    tec_porcentaje	= '" . $porcentaje . "'
    WHERE code = '".$_POST['upcode']."'
";
    mysqli_query($mysqli, $sql);
    echo mysqli_error($mysqli);
}
if ($_GET['id'] == 2) {
    $trabajo = $_POST['trabajo'];
    $articulo = $_POST['articulo'];
    $marca = $_POST['marca'];
    $date = $_POST['date'];
    $falla = $_POST['falla'];

    $sql = "UPDATE tb_ordendata
    SET
    work = '" . $trabajo . "', 
    articulo = '" . $articulo . "', 
    marca = '" . $marca . "', 
    date = '" . $date . "', 
    falla = '" . $falla . "'
    WHERE codeOrden = '".$_POST['upcode']."'
    ";

    mysqli_query($mysqli, $sql);
    echo mysqli_error($mysqli);
}
if ($_GET['id'] == 3) {
    $myArray = $_REQUEST['data'];
    $sql = "INSERT INTO tb_ordenmateriales(codeOrden,codeInventario,cantidad,total) VALUES ";
    $sqlMovimiento = "INSERT INTO tb_inventariomovimiento(codePro,op,concepto,date,cantidad) VALUES ";
    $sqlUpdate ="";

    foreach($myArray as $value){
        if ($value['new'] == "true") {
            $sql .= "('".$_POST['upcode']."', '".$value['code']."', '".$value['cantidad']. "', '".$value['total']. "'),";
            $sqlMovimiento .= "('".$value['code']."', '2', 'Orden ".$_GET['cliente']."', '".$_GET['date']. "' , '".$value['cantidad']. "'),";
            $sqlUpdate .= "UPDATE tb_inventario SET cantidad= cantidad-".$value['cantidad']." WHERE code=".$value['code'].";";
        }
    }
    $sql =  substr($sql, 0, -1);
    $sqlMovimiento =  substr($sqlMovimiento, 0, -1);
    $sql = $sql."; ".$sqlMovimiento.";".$sqlUpdate;
    mysqli_multi_query($mysqli,$sql);
    echo mysqli_error($mysqli);
}