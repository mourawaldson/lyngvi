<?php

class RepositorioException extends Exception{
	private $mensagem;
	public function __construct($mensagem, $erro='', $sql=''){
		$this->setMensagem( parent::getMessage() . "<br>" . $mensagem . "<br>" . $erro . "<hr>" . $sql);
	}
	
	private function setMensagem( $valor ){
		$this->mensagem = $valor;
	}
	
	public function getMensagem(){
		return $this->mensagem;
	}
}

?>