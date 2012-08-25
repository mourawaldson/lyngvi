<?php

require_once("./util/Repositorio.php");
require_once("./sql/AdministradorSQL.php");

class ControladorAdministrador{
	private $admin;
	private $erro;

	function __construct( $admin=null ){
		$this->admin = $admin;
	}

	private function setAdmin( $valor ){
		$this->admin = $valor;
	}

	public function getAdmin(){
		return $this->admin;
	}

	private function setErro($msg){
		$this->erro = $msg;
	}

	public function getErro(){
		return 	$this->erro;
	}

	public function verificaLogin($admin=null){

		if (isset($admin) ){
			$this->admin = $admin;
		}

		try{
			if (Repositorio::QtdRegistros(AdministradorSQL::sqlLoginSenha($this->admin->getLogin(), $this->admin->getSenha() ) ) == 1){
				return true;
			}else{
				return false;
			}
		}catch(RepositorioException $repE){
			echo $this->setErro($repE->getMensagem());
			return false;
		}

	}

	public function inserirAdministrador(){

		try{
			if( !Repositorio::QtdRegistros(AdministradorSQL::sqlLogin( $this->admin->getLogin() ))){
				Repositorio::Inserir(AdministradorSQL::sqlInserir($admin->getAdmin()) );
				return true;
			}else{
				return false;
			}
		}catch(RepositorioException $repE){
			echo $repE->getMensagem();
		}
	}

	public function alterarAdministrador(){	
		try{
			Repositorio::Alterar( AdministradorSQL::sqlAlterar($this->admin->getLogin(),$this->admin->getSenha()) );
			return true;
		}catch(RepositorioException $repE){
			return false;
			echo $repE->getMensagem();
		}
	}

/*	public function excluirAdministrador(){	
		try{
			if( !Repositorio::QtdRegistros( AdministradorSQL::sqlLoginSenha( $this->getAdmin()->getLogin() ) ) ){
				Repositorio::Excluir( AdministradorSQL::sqlExcluir($Administrador) );
				return true;	
			}else{
				return false;
			}
		}catch(RepositorioException $repE){
			echo $repE->getMensagem();
		}
	}
*/
	public function listarAdministradores(){
		try{
			Repositorio::Carregar( AdministradorSQL::sqlListar() );
			return true;			
		}catch(RepositorioException $repE){
			echo $this->setErro($repE->getMensagem());
			return false;
		}
	}
	
	public function carregarAdministrador(){
		try{
			$administradorArray = Repositorio::Carregar( AdministradorSQL::sqlLogin( $this->admin->getLogin() ) );
			$this->admin->setId($administradorArray[0]["Id"]);
			$this->admin->setLogin($administradorArray[0]["Login"]);
			$this->admin->setSenha($administradorArray[0]["Senha"]);
			return true;
		}catch(RepositorioException $repE){
			echo $this->setErro($repE->getMensagem());
			return false;
		}
	}

	public function iniciarSessionAdministrador() {
		session_start();
		$_SESSION['administrador'] = $this->admin;
	}

	public function fecharSessionAdministrador(){
		session_start();
		unset($_SESSION['administrador']);
	}

}

?>