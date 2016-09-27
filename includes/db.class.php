<?php
abstract class database {
	private static $db_host = 'localhost';
	private static $db_user = 'root';
	private static $db_pass = '123';
	protected $db_name = 'pagohub';
	protected $query;
	protected $rows = array();
	private $conn;
	public $mensaje = 'Vacio';
	public $error;

	# métodos abstractos para ABM de clases que hereden
	//abstract protected function get();
	//abstract protected function set();
	//abstract protected function edit();
	//abstract protected function delete();
	
	# Conectar a la base de datos
	private function open_connection() {
		$this->conn = new mysqli(self::$db_host, self::$db_user,
		self::$db_pass, $this->db_name);
	}
	# Desconectar la base de datos
	private function close_connection() {
		$this->conn->close();
	}

	# Ejecutar un query simple del tipo INSERT, DELETE, UPDATE
	protected function execute_single_query() {
		if($_POST) {
			$this->open_connection();
			$this->conn->query($this->query);
			$this->close_connection();
		} else {
			$this->error = "Error";
			$this->mensaje = 'Metodo no permitido';
		}
	}

	# Traer resultados de una consulta en un Array
	protected function get_results_from_query() {
		$this->open_connection();
		$result = $this->conn->query($this->query);

		while ($this->rows[] = $result->fetch_assoc()){
			//array_pop($this->rows);
		}
		array_pop($this->rows); //ELIMINA EL ULTIMO RESULTADO 'null'
		$result->free(); //libera la consulta
		$this->close_connection(); //cierra la conexion

	}

	# Conexion para sanitizar variables
	protected function escape_string($var){
		$this->open_connection();
		$var = mysql_real_escape_string($var);
		$this->close_connection();
		return $var;
	}

}
?>