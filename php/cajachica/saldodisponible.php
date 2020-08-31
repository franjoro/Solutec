<?php
    require_once("../conexion.php");
    $row = mysqli_fetch_array(mysqli_query($mysqli, "SELECT Monto FROM tb_cajatotal WHERE code='1' "));
    $total ="$".number_format($row[0], 2);
    echo $total;
?>