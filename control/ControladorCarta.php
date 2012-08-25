<?php

require_once("./util/Repositorio.php");
require_once("./sql/CartaSQL.php");


class ControladorCarta{
	private $card;

	private $erro;

	function __construct( $carta=null ){
		$this->card = $carta ;
	}

	private function setCard( $valor ){
		$this->card = $valor;
	}

	public function getCard(){
		return $this->card;
	}

	private function setErro($msg){
		$this->erro = $msg;
	}

	public function getErro(){
		return 	$this->erro;
	}

	public function listagemCartas(){
		try{
			return $cartaLista = Repositorio::Registros( CartaSQL::sqlListar());
		}catch(RepositorioException $repE){
			echo $this->setErro($repE->getMensagem());
			return false;
		}
	}

	


}

?>