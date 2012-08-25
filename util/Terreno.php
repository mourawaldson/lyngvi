<?php

	class Terreno{
		private $id;
		private $nome;

		public function __construct($id = null,$nome){
       		$this->id = $id;
			$this->nome = $nome;
		}

		public function __toString() {
			$string  = "\n";
			$string .= "Terreno:\n";
			$string .= "\tId: ".$this->getId()."\n";
			$string .= "\tNome: ".$this->getNome()."\n";

			return $string;
		}

		function getNome(){
			return $this->nome;
		}

		function getId(){
			return $this->id;
		}

		function setNome($nome){
			$this->nome = $nome;
		}
		
		function setId($id){
			$this->id = $id;
		}

	}

?>