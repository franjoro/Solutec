<?php
require_once("../conexion.php");
$sql = "INSERT INTO tb_inventario(name,codeP,descripcion,cantidad,precio,codeProovedor, foto) 
VALUES('".$_POST['name']."','".$_POST['codigo']."' ,'".$_POST['descripcion']."' ,'".$_POST['cantidad']."' ,'".$_POST['precio']."' ,'".$_POST['op']."', '".$_GET['imageP']."') ";


if($query =mysqli_query($mysqli,$sql )){
   echo true;
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}
mysqli_close($mysqli);
?>