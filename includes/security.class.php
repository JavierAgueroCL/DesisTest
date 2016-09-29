<?php
# Importo base de datos
require_once('db.class.php');

class Security extends database {
	############################### PROPIEDADES ################################
	public $var;

	/**
	* Filtra los datos de manera basica
	* @return include
	*/
	public function sanitize($var) {

		//$var = htmlentities($var); #Escapa a HTML
		//$var = html_entity_decode($var); #Transforma a ASCII
		//$var = pg_escape_string($var); #Realiza escape de string
		$var = utf8_decode($var); #Transforma los caracteres a latin

		$limitations = array('drop','update', 'truncate');
		foreach ($limitations as $value) {
			if($value == $var){
				echo "El valor '$var' es invalido";
				exit();
			}
		}

	}
}
?>