<?php

require_once("./util/Repositorio.php");
require_once("./sql/JogadorSQL.php");
require_once("./sql/BaralhoSQL.php");
require_once("./sql/JogadoresLogadosSQL.php");

class ControladorJogador{
	private $player;
	private $erro;

	function __construct( $player ){
		$this->player = $player;
	}

	public function setPlayer( $player ){
		$this->player = $player;
	}

	public function getPlayer(){
		return $this->player;
	}

	private function setErro($msg){
		$this->erro = $msg;
	}

	public function getErro(){
		return 	$this->erro;
	}

	public function inserirJogador($id_usuario){
		try{
			if( !Repositorio::QtdRegistros(JogadorSQL::sqlVerificaNome($this->player->getNome() ) ) ){
				Repositorio::Inserir( JogadorSQL::sqlInserir($id_usuario, $this->player->getNome(),$this->player->getImagem() ) );
				return true;
			}else{
				return false;
			}
		}catch(RepositorioException $repE){
			echo $repE->getMensagem();
		}
	}

	public function alterarJogador(){
		try{
			if( Repositorio::QtdRegistros( JogadorSQL::sqlVerificaId( $this->player->getId() ) ) ){
				Repositorio::Alterar( JogadorSQL::sqlAlterar($this->player->getId(),$this->player->getPartidas(),$this->player->getVitorias(),$this->player->getDinheiro() ) );
				return true;
			}else{
				return false;
			}
		}catch(RepositorioException $repE){
			echo $repE->getMensagem();
		}
	}

	public function excluirJogador(){
		try{
			if( Repositorio::QtdRegistros( JogadorSQL::sqlVerificaId( $this->player->getId() ) ) ){
				Repositorio::Excluir( JogadorSQL::sqlExcluir($this->player->getId() ) );
				return true;
			}else{
				return false;
			}
		}catch(RepositorioException $repE){
			echo $repE->getMensagem();
		}
	}

	public function carregarJogador(){
		try{
			$jogadorArray = Repositorio::Carregar( JogadorSQL::sqlVerificaId( $this->player->getId() ) );
			$this->player->setNome($jogadorArray[0]["Nome"]);
			$this->player->setPartidas($jogadorArray[0]["Qtd_Partidas"]);
			$this->player->setVitorias($jogadorArray[0]["Qtd_Vitorias"]);
			$this->player->setDinheiro($jogadorArray[0]["Dinheiro"]);
			$this->player->setImagem($jogadorArray[0]["Url_Imagem"]);
		}catch(RepositorioException $repE){
			echo $this->setErro($repE->getMensagem());
			return false;
		}
	}

	public function carregarId(){
		try{
			$jogadorArray = Repositorio::Carregar( JogadorSQL::sqlVerificaNome( $this->player->getNome() ) );
			$this->player->setId($jogadorArray[0]["Id"]);
		}catch(RepositorioException $repE){
			echo $this->setErro($repE->getMensagem());
			return false;
		}
	}
	
	public function carregarBaralho(){
		try{
			$baralho = Repositorio::Carregar( BaralhoSQL::sqlListarBaralhoJogador( $this->player->getId() ) );
			$this->player->addCarta($baralho);
		}catch(RepositorioException $repE){
			echo $this->setErro($repE->getMensagem());
			return false;
		}
	}

	public function logarJogador() {
		try{
			session_start();
			$id_usuario = $_SESSION['usuario']->getId();
			Repositorio::Inserir( JogadoresLogadosSQL::sqlInserir($id_usuario,$this->player->getId(),date('YmdHis') ) );
			$_SESSION['jogadorlogado']=($this->player);
		}catch(RepositorioException $repE){
			echo $repE->getMensagem();
		}
	}

	public function verificarJogadorLogado($id_usuario) {
		try{
			if(Repositorio::QtdRegistros(JogadoresLogadosSQL::sqlId($id_usuario) ) == 1){
				return true;
			}else{
				return false;
			}
		}catch(RepositorioException $repE){
			echo $this->setErro($repE->getMensagem());
			return false;
		}
	}

	public function atualizarJogadorLogado() {
		try{
			session_start();
			$id_usuario = $_SESSION['usuario']->getId();
			Repositorio::Alterar( JogadoresLogadosSQL::sqlAlterar( $id_usuario,$this->player->getId(),date('YmdHis') ) );
			$_SESSION['jogadorlogado']=($this->player);
		}catch(RepositorioException $repE){
			echo $repE->getMensagem();
		}
	}

	public function deslogarJogador(){
		try{
			Repositorio::Excluir( JogadoresLogadosSQL::sqlExcluir($this->player->getId() ) );
			session_start();
			$_SESSION['jogadorlogado']=(null);
			
			/*
			$this->carregarJogador();
			$this->carregarBaralho();
			*/
		}catch(RepositorioException $repE){
			echo $repE->getMensagem();
		}
	}
	
	public function listarJogadoresLogados(){
		try{
			$arrayjogadoresonline = Repositorio::Carregar( JogadoresLogadosSQL::sqlIdJogador($this->player->getId()) );
			return $arrayjogadoresonline;
		}catch(RepositorioException $repE){
			echo $repE->getMensagem();
		}
	}

}

?>