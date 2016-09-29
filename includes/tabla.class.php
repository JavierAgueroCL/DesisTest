<?php
# Importo base de datos
require_once('db.class.php');
require_once('functions.php');

class Tabla extends database {

	// METODOS BASICOS DE REGISTROS
	public function get($consulta) {
		if($consulta != ''){
			$this->query = $consulta;

			$this->get_results_from_query();
		}
		if(count($this->rows) >= 1) {
			$this->error = "Error";
			$this->mensaje = "Ya existe";
			return $this->rows;
		} else {
			$this->error = "Exito";
			$this->mensaje = "El registro ha sido creado";
		}
	}

	# Crear un nuevo registro
	public function set($user_data=array()) {

		if(array_key_exists('rut', $user_data)) {

			$busca_rut = $this->get("SELECT rut FROM  public.empresas where rut='".$user_data['rut']."';");

			if(count($busca_rut) >= 1) {  // Verifica si el rut ya existe
				$this->error = "Error";
				$this->mensaje = 'El rut ya esta registrado
				<script>jQuery(".alert").removeClass("alert-success").addClass("alert-danger");</script>';
			}  
			else {
	
				$this->query = "
					SELECT registro_empresa (
						'".$user_data['rut']."',
						'".$user_data['razon_social']."',
						'".$user_data['giro_comercial']."',
						'".$user_data['direccion']."',
						".$user_data['ciudad'].",
						".$user_data['comuna'].",
						'".$user_data['nombre_contacto']."',
						'".$user_data['email']."',
						'".conv($user_data['factura'])."',
						'".conv($user_data['boleta'])."',
						'".conv($user_data['exportacion'])."',
						'".conv($user_data['guia_despacho'])."',
						'".conv($user_data['factura_compra'])."',
						'".conv($user_data['liquidacion'])."',
						'".conv($user_data['factura_exenta'])."'
					);
				";

				$this->execute_single_query();
				// $this->error = "Exito";
				// $this->mensaje = 'El registro ha sido insertado
				// <script>jQuery(".alert").removeClass("alert-danger").addClass("alert-success");</script>';


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
