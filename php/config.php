<?php

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