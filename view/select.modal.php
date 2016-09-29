<?php
include("includes/tabla.class.php");
include_once("includes/security.class.php");

referer();
$tabla = new Tabla();
$security = new Security();


/** SELECCIONA UNA COMUNA */
if($_GET['comuna'] == true) {
	$id_region = $security->sanitize($_GET['region']);

	$resultado = $tabla->get("
		SELECT comuna_id,comuna
		FROM comunas_view
		WHERE region_id=".$_GET['region']."
		ORDER BY comuna_id ASC;");

		foreach ($resultado as $info){
            echo'<option value="'. $info['comuna_id'].'">'. $info['comuna'].'</option>';
    }

}
/** SELECCIONA UNA REGION */
else {
	$resultado = $tabla->get("
		SELECT region_id,region
		FROM comunas_view
		GROUP BY region,region_id
		ORDER BY region_id ASC");
	echo '
	<option value="">-- Region --</option>';
	foreach ($resultado as $info){
            echo'<option value="'. $info['region_id'].'">'. $info['region'].'</option>';
    }
}
?>


