<?php

require_once("./util/Repositorio.php");
require_once("./sql/NoticiaSQL.php");

class ControladorNoticia{
	private $noticia;
	private $erro;

	function __construct( $noticia ){
		$this->noticia = $noticia ;
	}

	private function setNoticia( $valor ){
		$this->noticia = $valor;
	}

	public function getNoticia(){
		return $this->noticia;
	}

	private function setErro($msg){
		$this->erro = $msg;
	}

	public function getErro(){
		return 	$this->erro;
	}

	public function inserirNoticia(){
		try{
			Repositorio::Inserir( NoticiaSQL::sqlInserir($this->noticia->getTitulo(),$this->noticia->getTexto(),date('YmdHis') ) );
			return true;
		}catch(RepositorioException $repE){
			return false;
			echo $repE->getMensagem();
		}
	}

	public function alterarNoticia(){
		try{
			Repositorio::Alterar( NoticiaSQL::sqlAlterar($this->noticia->getTitulo(),$this->noticia->getTexto(),date('YmdHis'),$this->noticia->getId()) );
			return true;
		}catch(RepositorioException $repE){
			return false;
			echo $repE->getMensagem();
		}
	}

	public function excluirNoticia(){
		try{
			Repositorio::Excluir( NoticiaSQL::sqlExcluir($this->noticia->getId()) );
			return true;
		}catch(RepositorioException $repE){
			return false;
			echo $repE->getMensagem();
		}
	}

	public function carregarNoticia(){
		try{
			$noticiaEscolhida = Repositorio::Carregar( NoticiaSQL::sqlCarregarId( $this->noticia->getId() ) );
			$this->noticia->setId($noticiaEscolhida [0]["Id"]);
			$this->noticia->setTitulo($noticiaEscolhida [0]["Titulo"]);
			$this->noticia->setTexto($noticiaEscolhida [0]["Texto"]);
			$this->noticia->setDataHora($noticiaEscolhida [0]["DataHora"]);
		}catch(RepositorioException $repE){
			echo $this->setErro($repE->getMensagem());
			return false;
		}
	}
	
	public function pesquisarNoticia($id){
		try{
			return $noticiaEncontrada = Repositorio::QtdRegistros( NoticiaSQL::sqlCarregarId($id) );
		}catch(RepositorioException $repE){
			return false;
			echo $repE->getMensagem();
		}
	}
		
	public function listarNoticias(){
		try{
			return $noticiaLista = Repositorio::Registros( NoticiaSQL::sqlListar() );
		}catch(RepositorioException $repE){
			return false;
			echo $repE->getMensagem();
		}
	}

	public function iniciarSessionNoticia() {
		session_start();
		$_SESSION['noticia'] = $this->noticia;
	}

	public function fecharSessionNoticia(){
		session_start();
		unset($_SESSION['noticia']);
	}

}

?>