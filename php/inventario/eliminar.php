<?php
require_once("../conexion.php");
$id = $_GET['id'];
$sql = "DELETE FROM tb_inventario WHERE code='".$id."' ";
if ($query =mysqli_query($mysqli, $sql)) {
    echo mysqli_insert_id($mysqli);
    ;
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}
mysqli_close($mysqli);
