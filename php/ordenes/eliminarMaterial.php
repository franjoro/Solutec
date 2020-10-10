<?php
require_once("../conexion.php");
$id = $_GET['id'];

$sql = "DELETE FROM tb_ordenmateriales WHERE code='".$id."' ;";
$sql .=" UPDATE tb_ordenmain SET UTec='".$_POST['tec']."', UNeta='".$_POST['neta']."' WHERE code='".$_POST['upcode']."' " ;


// echo $sql;

$query= mysqli_multi_query($mysqli,$sql);

//     echo mysqli_error($mysqli);

mysqli_close($mysqli)
?>