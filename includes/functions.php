<?php

include("security.class.php");
/**
 * Comprueba si la solicitud del documento fue realizada
 * desde el servidor local
 * @return PHP_EXIT
 */
function referer() {
	if($GLOBALS['base'] != $_SERVER['HTTP_REFERER']) {
		?>
		<h1>Error de conexión</h1>
		<script>
			alert('Error de Conexion: Intente mas tarde');
		</script>
		<?php
		exit();
	}
}


/**
 * Selecciona el Modal segun el valor del metodo GET
 * @return include
 */
function get_modal($get) {
	if(!file_exists("view/".$get.".modal.php")) {
		echo "<h1>El modal no existe</h1>";
		// var_dump($get);
	}
	elseif(!empty($get)) {
		include_once("view/".$get.".modal.php");
	}
	else {
		include_once("view/home.php");
	}
	
}

/**
 * Recibe la informacion del formulario y la ingresa a un array
 * @return Array
 */
function recibir_formularios($post_data) {
	$valores = array();
	$security = new Security();

	$errorJS = '<script>jQuery(".alert").removeClass("alert-success").addClass("alert-danger");</script>';

	foreach ($post_data as $clave=>$valor) {
		$valores["$clave"] = $valor;
		//$valores["$clave"] = $security->sanitize($valor);
		//array_push("$clave" => "$valor", $out);
		
	}
	if(valida_rut($valores['rut']) == false){ 
		echo 'RUT Invalido'.$errorJS; 
		exit();
	}
	elseif(!filter_var($valores['email'], FILTER_VALIDATE_EMAIL)){
		echo 'Email invalido'.$errorJS;
		exit();
	}
	elseif(strlen($valores['giro_comercial']) < 6){
		echo 'Ingrese un giro mas largo'.$errorJS;
		exit();
	}
	elseif(empty($valores['razon_social']) or empty($valores['nombre_contacto'])){
		echo 'No puede dejar su Razon Social y Nombre de Contacto vacios'.$errorJS;
		exit();
	}
	elseif(empty($valores['factura']) or empty($valores['boleta']) or empty($valores['exportacion'])){
		echo 'Debe seleccionar Facturas, Boletas y documentos de exportacion obligatoriamente'.$errorJS;
		exit();
	}
	return $valores;
}

/**
 * Comprueba si el rut ingresado es valido
 * @param string $rut RUT
 * @return boolean
 */
function valida_rut($rut)
{
    if (!preg_match("/^[0-9.]+[-]?+[0-9kK]{1}/", $rut)) {
        return false;
    }
    $rut = preg_replace('/[\.\-]/i', '', $rut);
    $dv = substr($rut, -1);
    $numero = substr($rut, 0, strlen($rut) - 1);
    $i = 2;
    $suma = 0;
    foreach (array_reverse(str_split($numero)) as $v) {
        if ($i == 8)
            $i = 2;
        $suma += $v * $i;
        ++$i;
    }
    $dvr = 11 - ($suma % 11);
    if ($dvr == 11)
        $dvr = 0;
    if ($dvr == 10)
        $dvr = 'K';
    if ($dvr == strtoupper($dv))
        return true;
    else
        return false;
}

/**
 * Transforma el ON en integer
 * @param string 
 * @return integer
 */
function conv($valor){
	if($valor == 'on') {
		$out = 1;
	}
	else {
		$out = 0;
	}

	return $out;
}

?>