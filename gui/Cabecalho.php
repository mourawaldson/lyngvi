<?php

class Cabecalho {
	private $titulo;
	private $estilos;
	private $scripts;
	
	public function __construct( $titulo ) {
		$this->setTitulo( $titulo );
		$this->estilos = array();
		$this->scripts = array();
	}
	
	private function setTitulo( $valor ) {
		$this->titulo = $valor;
	}
	
	protected function getTitulo() {
		return $this->titulo;
	}
	
	private function setEstilos( $valor ) {
		$this->estilos = $valor;
	}
	
	protected function getEstilos() {
		return $this->estilos;
	}
	
	public function addEstilo( $urlEstilo ) {
		$this->estilos[] =  $urlEstilo;
	}
	
	private function setScripts( $valor ) {
		$this->scripts = $valor;
	}
	
	protected function getScripts() {
		return $this->scripts;
	}
	
	public function addScript( $urlScript ) {
		$this->scripts[] =  $urlScript;
	}
	
	public function __toString() {
		$cabecalho = '
	<head>
		<title>' . $this->getTitulo() . '</title>
	';
		$listaEstilo = $this->getEstilos();
		for ($i=0; $i<sizeof($listaEstilo); $i++) {
			$cabecalho .= '	<link rel="stylesheet" type="text/css" href="' . $listaEstilo[$i] . '">
	';
		}
		
		$listaScript = $this->getScripts();
		for ($i=0; $i<sizeof($listaScript); $i++) {
			$cabecalho .= '	<script language="javascript" src="' . $listaScript[$i] . '"></script>
	';
		}
		$cabecalho .= '
	</head>
';

		return $cabecalho;
	}
	
}

?>