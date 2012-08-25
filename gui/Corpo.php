<?php

class Corpo {
	private $estrutura;
	private $conteudo;
	
	public function __construct( $estrutura, $conteudo ){
		$this->setEstrutura( $estrutura );
		$this->setConteudo( $conteudo );
	}
	
	private function setEstrutura( $valor ) {
		$this->estrutura = $valor;
	}
	
	private function getEstrutura(){
		return $this->estrutura;
	}
	
	protected function setConteudo( $valor ) {
		$this->conteudo = $valor;
	}
			
	private function getConteudo(){
		return $this->conteudo;
	}
	
	public function __toString(){
		return "<body>\n" . str_replace("<!--#CONTEUDO#-->", $this->getConteudo(), $this->getEstrutura() ) . "\n</body>";
	}
}

?>