<?php

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

?>