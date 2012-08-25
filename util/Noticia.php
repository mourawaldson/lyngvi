<?php

	class Noticia{
		private $titulo;
		private $texto;
		private $datahora;
		private $id;
		
		public function __construct($titulo,$texto,$datahora = null,$id = null){
			$this->titulo = $titulo;
			$this->texto = $texto;
			$this->datahora = $datahora;
			$this->id = $id;
		}
		
		public function __toString(){
			$string = "\n";
			$string .= "Notícia:\n";
			$string .= "\tId: ".$this->getId()."\n";
			$string .= "\tTítulo: ".$this->getTitulo()."\n";
			$string .= "\tNotícia Completa: ".$this->getTexto()."\n";
			$string .= "\tData Hora: ".$this->getDataHora()."\n";
			
			return $string;
		}
		
		function getTitulo(){
			return $this->titulo;
		}
		
		function getTexto(){
			return $this->texto;
		}
		
		function getDataHora(){
			return $this->datahora;
		}
		
		function getId(){
			return $this->id;
		}
		
		function setTitulo($titulo){
			$this->titulo = $titulo;
		}
		
		function setTexto($texto){
			$this->texto = $texto;
		}
		
		function setDataHora($datahora){
			$this->datahora = $datahora;
		}
		
		function setId($id){
			$this->id = $id;
		}

	}

?>