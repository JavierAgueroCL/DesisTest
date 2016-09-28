<?php
abstract class database {
	private static $db_host = 'localhost';
	private static $db_user = 'postgres';
	private static $db_pass = '123';
	private static $db_port = '5432';
	protected $db_name = 'desis';
	protected $query;
	protected $rows = array();
	private $conn;
	public $mensaje;
	public $error;
	public $result;

	/**
	 * Abre la conexion a la base de datos
	 * @return Object
	 */
	private function abrir_conexion() {
		$this->conn = pg_connect("
			host=".self::$db_host."
			port=".self::$db_port."
			dbname=".$this->db_name."
			user=".self::$db_user."
			password=".self::$db_pass);
	}

	/**
	 * Abre la conexion a la base de datos
	 * @return Bolean
	 */
	private function cerrar_conexion() {
		pg_close();
	}

	/**
	 * Ejecuta una consulta unica (UDPDATE, INSERT)
	 * @return Object
	 */
	protected function execute_single_query() {
		if($_POST) {
			$this->abrir_conexion();
			$this->result = pg_query($this->query);
			$this->cerrar_conexion();
		} else {
			$this->error = "Error";
			$this->mensaje = 'Metodo no permitido';
		}
	}

	/**
	 * Devuelve los resultados de una consulta (SELECT)
	 * @return Array
	 */
	protected function get_results_from_query() {
		$this->abrir_conexion();
		$this->result = pg_query($this->query);

		while ($this->rows[] = pg_fetch_array($this->result)){
			//array_pop($this->rows);
		}
		array_pop($this->rows); //ELIMINA EL ULTIMO RESULTADO 'null'
		$this->cerrar_conexion();
	}

}
?>