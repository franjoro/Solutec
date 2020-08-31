<?php
require_once("../conexion.php");
    $row = mysqli_fetch_array(mysqli_query($mysqli, "SELECT Monto FROM tb_cajatotal WHERE code='1' "));
    $actual =number_format($row[0], 2);
    if ($_POST['op'] === "0") {
        $newSaldo = $actual + $_POST['monto'];
    } else {
        $newSaldo = $actual - $_POST['monto'];
    }

$sql = "INSERT INTO tb_cajamovimiento(Actual,Monto,Op,Concepto,NewSaldo,Date) 
VALUES('".$actual."','".$_POST['monto']."' ,'".$_POST['op']."' ,'".$_POST['concepto']."','".$newSaldo."','".$_POST['date']." ') ";
if ($query =mysqli_query($mysqli, $sql)) {
    $sql = "UPDATE tb_cajatotal SET Monto = '".$newSaldo."' WHERE code='1' ";
    mysqli_query($mysqli, $sql);
    echo "AllOk";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}
mysqli_close($mysqli);
