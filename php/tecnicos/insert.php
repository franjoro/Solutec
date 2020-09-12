<?php
require_once("../conexion.php");
$sql = "INSERT INTO tb_tecnico(nombre,tel,telemer) 
VALUES('".$_POST['name']."','".$_POST['tel']."' ,'".$_POST['telemer']."') ";
if($query =mysqli_query($mysqli,$sql )){
   echo true;
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}
mysqli_close($mysqli);
?>





