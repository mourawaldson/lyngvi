<?php

require_once("./util/Repositorio.php");
require_once("./sql/BaralhoSQL.php");

class ControladorBaralho{
	private $baralho;
	private $erro;

	function __construct( $baralho=null ){
		$this->baralho = $baralho ;
	}

	public function setBaralho( $baralho ){
		$this->baralho = $baralho;
	}

	public function getBaralho(){
		return $this->baralho;
	}

	private function setErro($msg){
		$this->erro = $msg;
	}

	public function getErro(){
		return 	$this->erro;
	}

	public function inserirBaralho($id_jogador){
		try{
			Repositorio::Inserir( BaralhoSQL::sqlInserir($id_jogador,$this->baralho->getCarta(), $this->baralho->getHp(),$this->baralho->getAtaque(), $this->baralho->getDefesa(), $this->baralho->getLevel(), $this->baralho->getExperiencia() ) );
		}catch(RepositorioException $repE){
			echo $repE->getMensagem();
		}
	}
	
	public function alterarBaralho(){
		try{
			if( Repositorio::QtdRegistros( BaralhoSQL::sqlVerificaId( $this->baralho->getId() ) ) ){
				Repositorio::Alterar( BaralhoSQL::sqlAlterar($this->baralho->getId(), $this->baralho->getCarta(), $this->baralho->getHp(),$this->baralho->getAtaque(), $this->baralho->getDefesa(), $this->baralho->getLevel(), $this->baralho->getExperiencia() ) );
				return true;
			}else{
				return false;
			}
		}catch(RepositorioException $repE){
			echo $repE->getMensagem();
		}
	}

	function evoluirNivel2(){
		if ($this->nivel == 1 && $this->level >=50){
			$this->nivel++;
			$this->hp += mt_rand(7,9);
			$this->ataque += mt_rand(3,5);
			$this->defesa += mt_rand(3,5);
			
			return true;
		}else{
			return false;
		}
	}


	function evoluirNivel3(){
		if ($this->nivel == 2 && $this->level >=100){
			$this->nivel++;
			$this->hp += mt_rand(9,11);
			$this->ataque += mt_rand(5,7);
			$this->defesa += mt_rand(5,7);

			return true;
		}else{
			return false;
		}
	}

	public function carregarBaralho(){
		try{
			$baralhoArray = Repositorio::Carregar( BaralhoSQL::sqlVerificaId( $this->baralho->getId() ) );
			$this->baralho->setId($baralhoArray[0]["Id"]);
			$this->baralho->setLevel($baralhoArray[0]["Level"]);
			$this->baralho->setExperiencia($baralhoArray[0]["Experiencia"]);
			$this->baralho->setHp($baralhoArray[0]["HP"]);
			$this->baralho->setAtaque($baralhoArray[0]["Ataque"]);
			$this->baralho->setDefesa($baralhoArray[0]["Defesa"]);
			$this->baralho->setCarta($baralhoArray[0]["Id_Carta"]);
		}catch(RepositorioException $repE){
			echo $this->setErro($repE->getMensagem());
			return false;
		}
	}

}

?>