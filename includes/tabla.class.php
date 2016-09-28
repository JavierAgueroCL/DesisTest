<?php
# Importo base de datos
require_once('db.class.php');

class Tabla extends database {

	// METODOS BASICOS DE REGISTROS
	public function get($condicion) {
		if($condicion != ''){
			$this->query = '
			SELECT *
			FROM usuarios
			WHERE '.$condicion.'
			ORDER BY "ID" desc';

			$this->get_results_from_query();
		}
		if(count($this->rows) >= 1) {
			$this->error = "Exito";
			$this->mensaje = "Registros encontrado";
			return $this->rows;
		} else {
			$this->error = "Error";
			$this->mensaje = 'Registro no encontrado';
		}
	}

	# Crear un nuevo registro
	public function set($user_data=array()) {

		if(array_key_exists('rut', $user_data)) {

			if(empty($user_data['rut'])) { //Verificacion de RUT
				$this->error = "Error";
				$this->mensaje = 'Las contraseñas ingresadas no son iguales';
			}
			/*elseif(!filter_var($user_data['email'], FILTER_VALIDATE_EMAIL)){
				$this->error = "Error";
				$this->mensaje = 'Ingrese un RUT valido';	//Incluir RUT.js
				$this->mensaje = 'Ingrese un Email valido';	
			}*/
			else {

				$this->query = "INSERT INTO public.usuarios(
					nombre, email)
					VALUES ('".$user_data['rut']."', '".$user_data['email']."');
				";

				$this->execute_single_query();

				$this->error = "Exito";
				$this->mensaje = 'Registro agregado exitosamente
				<script>
					jQuery(".alert").removeClass("alert-danger").addClass("alert-success");
					jQuery("#cargar-info").trigger( "click" );
				</script>';
			}

		} 
		else {
			$this->error = "Error";
			$this->mensaje = 'No se ha agregado el Registro
			<script>jQuery(".alert").removeClass("alert-success").addClass("alert-danger");</script>';
		}

	}


	# Método destructor del objeto
	function __destruct() {
		unset($this);
	}

}  // End class



?>