<?php
	class Round{
		private $id;
		private $baralho1;
		private $baralho2;
		private $arrayvencedorperdedor;

		function __construct($id=null,$baralho1,$baralho2){
			$this->id = $id;
			$this->baralho1 = $baralho1;
			$this->baralho2 = $baralho2;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function setJogador1($baralho1){
			$this->baralho1 = $baralho1;
		}

		public function setJogador2($baralho2){
			$this->baralho2 = $baralho2;
		}
		
		public function setArrayvencedorperdedor($arrayvencedorperdedor){
			$this->arrayvencedorperdedor = $arrayvencedorperdedor;
		}

		public function getId(){
			return $this->id;
		}

		public function getBaralho1(){
			return $this->baralho1;
		}

		public function getBaralho2(){
			return $this->baralho2;
		}
		
		public function getArrayvencedorperdedor(){
			return $this->arrayvencedorperdedor;
		}

	}

?>