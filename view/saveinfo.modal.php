<?php
include("includes/tabla.class.php");
referer();
$data_info = recibir_formularios($_POST);
$tabla = new Tabla();
$tabla->set($data_info);
echo $tabla->mensaje;
?>
