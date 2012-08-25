<?php
	class Baralho{
		private $id;
		private $level;
		private $experiencia;
		private $hp;
		private $ataque;
		private $defesa;
		private $carta;

		function __construct($id,$carta=null,$level=1,$experiencia=0,$hp=30,$ataque=10,$defesa=10){
       		$this->id = $id;
			$this->carta = $carta;
			$this->level = $level;
			$this->experiencia = $experiencia;
			$this->hp = $hp;
			$this->ataque = $ataque;
			$this->defesa = $defesa;
		}

		function getId(){
			return $this->id;
		}

		function getLevel(){
			return $this->level;
		}

		function getExperiencia(){
			return $this->experiencia;
		}

		function getHp(){
			return $this->hp;
		}

		function getAtaque(){
			return $this->ataque;
		}

		function getDefesa(){
			return $this->defesa;
		}
		
		function getCarta(){
			return $this->carta;
		}
	
		function setId($id){
			$this->id = $id;
		}

		function setLevel($level){
			$this->level = $level;
		}

		function setExperiencia($experiencia){
			$this->experiencia = $experiencia;
		}

		function setHP($hp){
			$this->hp = $hp;
		}

		function setAtaque($ataque){
			$this->ataque = $ataque;
		}

		function setDefesa($defesa){
			$this->defesa = $defesa;
		}
		
		function setCarta($carta){
			$this->carta = $carta;
		}
		
		function atacar(){
			$sorteataque = mt_rand(90,125)/100;
			return floor($this->ataque*$sorteataque);
		}

		function defender(){
			$sortedefesa = mt_rand(20,50)/100;
			return floor($this->defesa*$sortedefesa);
		}
		
		function verificarTerreno($terreno){
			if($this->terreno == $terreno){
				$bonus = 0.10;
				$this->ataque += floor($this->ataque * $bonus);
				$this->defesa += floor($this->defesa * $bonus);
			}
		}
	
		function calculoExperiencia($inimigoderrotado){
			$this->experiencia += floor((($inimigoderrotado->getHp() + $inimigoderrotado->getAtaque() + $inimigoderrotado->getDefesa())/5) + ($inimigoderrotado->level - $this->level)*2) ;
			$this->verificarLevel();
		}
	
		function verificarLevel(){
			$levelauxiliar = $this->level;
			// A experiência é cumulativa, logo, deve-se somar as experiências exigidas em cada nivel
			for($levelauxiliar ; $levelauxiliar>0 ; $levelauxiliar--){
				$experienciaauxiliar += 100 + ($levelauxiliar - 1) * 20;
			}
			// Compara se atingiu a experiencia exigida
			if($this->experiencia >= $experienciaauxiliar)
			{
				$this->ganharLevel();
				return true;
			}else
				return false;
		}
	
		function ganharLevel(){
			$aumentoataque = mt_rand(3,5)/2;
			$aumentodefesa = mt_rand(3,5)/2;
			$aumentohp = mt_rand(5,7);
			
			$this->level++;
			$this->hp += floor($aumentohp);
			$this->ataque += floor($aumentoataque);
			$this->defesa += floor($aumentodefesa);
		}
	}

?>