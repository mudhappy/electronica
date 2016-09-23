<?php
// Conectar a la base de datos
//$link = mysql_connect('localhost', 'root', '');
//if (!$link) {
//    die('Not connected : ' . mysql_error());
//}

//if (! mysql_select_db('taller') ) {
//    die ('Can\'t use taller : ' . mysql_error());
//}


class Conexion
{
	private $host = "localhost";
	private $usuario = "root";
	private $pass = "";
	private $db = "taller";

	private $conexion = null;

	public function __construct()
	{
		$this->conexion = new mysqli($this->host,$this->usuario,$this->pass,$this->db);

		if($this->conexion->connect_errno)
		{
			echo "Error: " . $this->conexion->connect_errno;
		}
	}

	public function getConexion()
	{
		return $this->conexion;
	}
}

?>