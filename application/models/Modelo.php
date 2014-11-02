<?php class Modelo {

	private $conexionDB;

	public function __construct () {
		$this->conexionDB = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
 		$this->conexionDB->query("set character_set_results='utf8'");
		if ( $this->conexionDB->connect_error ) {
			echo "Error de conexión con la base de datos, por favor, revisen los datos de configuración";
			exit;
		}
	}

/* ==========================================================================
   Demo
   ========================================================================== */

	public function getAlgo() {

		$arrayReturn = [];		
		$result = $this->conexionDB->query("SELECT * FROM `algo`");

		while ( $filas=$result->fetch_assoc() ) {
			$arrayReturn[] = $filas;
		}	
		return $arrayReturn;

	} /* #getAlgo*/



} /* #Modelo */