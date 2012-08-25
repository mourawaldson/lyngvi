<?php

require_once("./util/Repositorio.php");
require_once("./sql/UsuarioSQL.php");
require_once("./sql/JogadorSQL.php");

class ControladorUsuario{
	private $user;
	private $players;
	private $erro;

	function __construct( $usuario=null ){
		$this->user = $usuario ;
	}

	private function setUser( $valor ){
		$this->user = $valor;
	}

	public function getUser(){
		return $this->user;
	}

	private function setErro($msg){
		$this->erro = $msg;
	}

	public function getErro(){
		return 	$this->erro;
	}

	public function verificaLogin($user=null){
		
		if (isset($user) ){
			$this->user = $user;
		}

		try{
			if (Repositorio::QtdRegistros(UsuarioSQL::sqlLoginSenha($this->user->getLogin(), $this->user->getSenha() ) ) == 1){
				return true;
			}else{
				return false;
			}
		}catch(RepositorioException $repE){
			echo $this->setErro($repE->getMensagem());
			return false;
		}
	}

	public function inserirUsuario(){
		try{
			if( !Repositorio::QtdRegistros(UsuarioSQL::sqlLogin( $this->user->getLogin() ) ) and !Repositorio::QtdRegistros( UsuarioSQL::sqlEmail( $this->user->getEmail() ) )){
				Repositorio::Inserir( UsuarioSQL::sqlInserir($this->user->getLogin(),$this->user->getSenha(),$this->user->getEmail()) );
				return true;
			}else{
				return false;
			}
		}catch(RepositorioException $repE){
			echo $repE->getMensagem();
		}
	}

	public function alterarUsuario(){
		try{
			if( !Repositorio::QtdRegistros( UsuarioSQL::sqlEmail( $this->user->getEmail() ) ) ){
				Repositorio::Alterar( UsuarioSQL::sqlAlterar($this->user->getLogin(),$this->user->getSenha(),$this->user->getEmail()) );
				return true;
			}else{
				return false;
			}
		}catch(RepositorioException $repE){
			echo $repE->getMensagem();
		}
	}

	public function excluirUsuario(){
		try{
			if( Repositorio::QtdRegistros( UsuarioSQL::sqlId( $this->user->getId() ) ) ){
				Repositorio::Excluir( UsuarioSQL::sqlExcluir($this->user->getId()) );
				return true;
			}else{
				return false;
			}
		}catch(RepositorioException $repE){
			echo $repE->getMensagem();
		}
	}

	public function listagemUsuarios(){
		try{
			return $usuarioLista = Repositorio::Registros( UsuarioSQL::sqlListar());
		}catch(RepositorioException $repE){
			echo $this->setErro($repE->getMensagem());
			return false;
		}
	}

	public function carregarUsuario(){
		try{
			$usuarioArray = Repositorio::Carregar( UsuarioSQL::sqlLogin( $this->user->getLogin() ) );
			$this->user->setId($usuarioArray[0]["Id"]);
			$this->user->setLogin($usuarioArray[0]["Login"]);
			$this->user->setSenha($usuarioArray[0]["Senha"]);
			$this->user->setEmail($usuarioArray[0]["Email"]);
			$jogadorArray = Repositorio::Carregar( UsuarioSQL::sqlListarJogadoresUsuario($this->user->getId()) );
			$this->user->setJogadores($jogadorArray);
			return true;
		}catch(RepositorioException $repE){
			echo $this->setErro($repE->getMensagem());
			return false;
		}
	}

	public function iniciarSessionUsuario() {
		session_start();
		$_SESSION['usuario'] = $this->user;
	}

	public function fecharSessionUsuario(){
		session_start();
		unset($_SESSION['usuario']);
	}

}

?>