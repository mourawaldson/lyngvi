<?php

require_once("./util/Repositorio.php");
require_once("./sql/TerrenoSQL.php");

class ControladorTerreno{
	private $nome;
	private $id;
	private $terreno;

	private $erro;

	function __construct( $terreno=null ){
		$this->terreno = $terreno ;
	}

	private function setNome( $nome ){
		$this->nome = $nome;
	}

	private function serId( $id ){
		$this->id = $id;
	}

	private function setTerreno( $valor ){
		$this->terreno = $valor;
	}

	public function getTerreno(){
		return $this->terreno;
	}

	public function getNome(){
		return $this->nome;
	}
	
	public function getId(){
		return $this->id;
	}

	private function setErro($msg){
		$this->erro = $msg;
	}

	public function getErro(){
		return 	$this->erro;
	}

	public function inserirTerreno(){
		try{
			if( !Repositorio::QtdRegistros(TerrenoSQL::sqlNome( $this->terreno->getNome() ))){
				Repositorio::Inserir( TerrenoSQL::sqlInserir($this->terreno->getNome()));
				return true;
			}else{
				return false;
			}
		}catch(RepositorioException $repE){
			echo $repE->getMensagem();
		}
	}
	
	public function alterarTerreno(){	
		try{
			Repositorio::Alterar( TerrenoSQL::sqlAlterar( $this->terreno->getId(),$this->terreno->getNome() ) );
			return true;
		}catch(RepositorioException $repE){
			return false;
			echo $repE->getMensagem();
		}
	}
	
	public function excluirTerreno(){
		try{
			if( Repositorio::QtdRegistros( TerrenoSQL::sqlId( $this->terreno->getId() ) ) ){
				Repositorio::Excluir( TerrenoSQL::sqlExcluir( $this->terreno->getId() ) );
				return true;
			}else{
				return false;
			}
		}catch(RepositorioException $repE){
			echo $repE->getMensagem();
		}
	}	

	public function listagemTerrenos(){
		try{
			return $terrenoLista = Repositorio::Registros( TerrenoSQL::sqlListar());
		}catch(RepositorioException $repE){
			echo $this->setErro($repE->getMensagem());
			return false;
		}
	}

	


}

?>