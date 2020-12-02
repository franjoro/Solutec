<?php 
require_once("../conexion.php");
$cliente = $_POST['cliente'];
$tecnico = $_POST['tecnico'];
$falla = $_POST['falla'];

$sql = "INSERT INTO tb_ordenmain(codeCliente, tecCode,status) VALUES ('".$cliente."','".$tecnico."',1)";
$sql= mysqli_query($mysqli,$sql);

$id =  mysqli_insert_id($mysqli);

$sql = "INSERT INTO tb_ordendata(codeOrden, falla) VALUES ('".$id."','".$falla."')";
$sql= mysqli_query($mysqli,$sql);

header("Location: ../../showOrdenes.php");
?>