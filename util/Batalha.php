<?php
	class Batalha{
		private $id;
		private $jogador1;
		private $jogador2;
		private $round1;
		private $round2;
		private $round3;
		private $terreno;
		private $vencedor;
		private $perdedor;

		function __construct($id=null,$jogador1,$jogador2,$round1,$round2,$round3,$terreno){
			$this->id = $id;
			$this->jogador1 = $jogador1;
			$this->jogador2 = $jogador2;
			$this->round1 = $round1;
			$this->round2 = $round2;
			$this->round3 = $round3;
			$this->terreno = $terreno;
		}

		public function setId($id){
			$this->id = $id;
		}
		public function setJogador1($jogador1){
			$this->jogador1 = $jogador1;
		}
		public function setJogador2($jogador2){
			$this->jogador2 = $jogador2;
		}
		public function setRound1($round1){
			$this->round1 = $round1;
		}
		public function setRound2($round2){
			$this->round2 = $round2;
		}
		public function setRound3($round3){
			$this->round3 = $round3;
		}
		public function setTerreno($terreno){
			$this->terreno = $terreno;
		}
		public function setVencedor($vencedor){
			$this->vencedor = $vencedor;
		}
		public function setPerdedor($perdedor){
			$this->perdedor = $perdedor;
		}
		public function getId(){
			return $this->id;
		}
		public function getJogador1(){
			return $this->jogador1;
		}
		public function getJogador2(){
			return $this->jogador2;
		}
		public function getRound1(){
			return $this->round1;
		}
		public function getRound2(){
			return $this->round2;
		}
		public function getRound3(){
			return $this->round3;
		}
		public function getTerreno(){
			return $this->terreno;
		}
		public function getVencedor(){
			return $this->vencedor;
		}
		public function getPerdedor(){
			return $this->perdedor;
		}
	}
?>
