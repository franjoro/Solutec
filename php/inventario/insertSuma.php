<?php
require_once("../conexion.php");


$op = $_GET['op'];

if($op === '1'){
$sql = "INSERT INTO tb_inventariomovimiento(codePro,op,concepto,date,cantidad) 
VALUES('".$_GET['code']."','".$_GET['op']."' ,'".$_POST['MSConcepto']."' ,'".$_POST['MsDate']."', '".$_POST['MSCantidadToS']."') ";
if ($query =mysqli_query($mysqli, $sql)) {
    $sql = "UPDATE tb_inventario SET cantidad = cantidad+'".$_POST['MSCantidadToS']."' WHERE code='".$_GET['code']."' ";
    $query =mysqli_query($mysqli, $sql);
    echo true;
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}
mysqli_close($mysqli);
}
if ($op === '0') {
    $sql = "INSERT INTO tb_inventariomovimiento(codePro,op,concepto,date,cantidad) 
VALUES('".$_GET['code']."','".$_GET['op']."' ,'".$_POST['RSConcepto']."' ,'".$_POST['RsDate']."', '".$_POST['RSCantidadToS']."') ";
    if ($query =mysqli_query($mysqli, $sql)) {
        $sql = "UPDATE tb_inventario SET cantidad = cantidad-'".$_POST['RSCantidadToS']."' WHERE code='".$_GET['code']."' ";
        $query =mysqli_query($mysqli, $sql);
        echo true;
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
    }
    mysqli_close($mysqli);
}











?>