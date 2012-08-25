<?php

class BancoException extends Exception{

	private $mensagem;

	public function __construct($mensagem, $erro=''){
		$this->setMensagem( parent::getMessage() . "<br>" . $mensagem . "<br>" . $erro);
	}

	private function setMensagem( $valor ){
		$this->mensagem = $valor;
	}

	public function getMensagem(){
		return $this->mensagem;
	}
}

?>