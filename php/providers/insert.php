<?php
require_once("../conexion.php");
$sql = "INSERT INTO tb_proveedores(name,address,tel,notes,contacto,telcontacto) 
VALUES('".$_POST['name']."','".$_POST['direccion']."' ,'".$_POST['tel']."' ,'".$_POST['notas']."' ,'".$_POST['contacto']."' ,'".$_POST['telContacto']."') ";
if($query =mysqli_query($mysqli,$sql )){
   echo true;
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}
mysqli_close($mysqli);
?>





