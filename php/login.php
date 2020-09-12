<?php 
require_once('conexion.php');
session_start();
$pin=$_POST['pin'];
$pass = md5($_POST['pass']);

$sql = "SELECT COUNT(*) , code FROM tb_users  WHERE user='".$pin. "' AND pass='" . $pass . "'  GROUP By code  ";
$query = mysqli_query($mysqli, $sql);
$row= mysqli_fetch_array($query);



if($row[0] == 0){
    echo "NotAccess";
}else{
        $_SESSION['user'] = $pin;
        echo "ok";
}
mysqli_close($mysqli);
?>