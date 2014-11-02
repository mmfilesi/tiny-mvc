<?php class Main {

	protected $modelo;

	public function __construct () {
		$this->modelo = new Modelo();
	}

	public function index() {

		$todoAlgo = $this->modelo->getAlgo();

		require_once( ROOT . '/application/views/commons/header.php' );
		require_once( ROOT . '/application/views/index.php' );
		require_once( ROOT . '/application/views/commons/footer.php' );
	}

	/* Para llamadas ajax */

	public function otraFuncion() {
		$todoOtroAlgo = json_encode( $this->modelo->getOtroAlgo() );
		echo $todoOtroAlgo;
	}

	

} /* #Main */