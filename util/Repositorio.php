<?php

require_once("./util/Banco.php");
require_once("./exception/RepositorioException.php");

class Repositorio{
	static public function QtdRegistros($sql){
		try{
			$banco = new Banco();
			$banco->selectSQL($sql);
			return $banco->getNumRows();
		}catch(BancoException $dataBaseException){
			throw new RepositorioException("Erro ao verificar o Login.", $dataBaseException->getMensagem() );
			return 0;
		}
	}

	static public function Registros($sql){
		try{
			$banco = new Banco();
			$banco->selectSQL($sql);
			return $banco->getResult();
		}catch(BancoException $dataBaseException){
			throw new RepositorioException("Erro ao Listar.", $dataBaseException->getMensagem() );
			return false;
		}
	}

	static public function Inserir($sql){
		try{
			$banco = new Banco();
			$banco->executeSQL($sql);
		}catch(BancoException $dataBaseException){
			throw new RepositorioException("Erro na inserчуo.", $dataBaseException->getMensagem(), $sql );
			return false;
		}
		return true;
	}

	static public function Alterar($sql){
		try{
			$banco = new Banco();
			$banco->executeSQL($sql);
		}catch(BancoException $dataBaseException){
			throw new RepositorioException("Erro na alteraчуo.", $dataBaseException->getMensagem(), $sql );
			return false;
		}
		return true;
	}

	static public function Excluir($sql){
		try{
			$banco = new Banco();
			$banco->executeSQL($sql);
		}catch(BancoException $dataBaseException){
			throw new RepositorioException("Erro na exclusуo.", $dataBaseException->getMensagem(), $sql );
			return false;
		}
		return true;
	}

	static public function Carregar($sql){
		try{
			$banco = new Banco();
			$banco->selectSQL($sql);
			return $banco->getResult();
		}catch(BancoException $dataBaseException){
			throw new RepositorioException("Erro ao carregar.", $dataBaseException->getMensagem(), $sql );
			return false;
		}
		return true;
	}
	
	static public function InserirKeys($sql){
		try{
			$banco = new Banco();
			$retorno = $banco->executeSQLKeys($sql);
			return $retorno;
		}catch(BancoException $dataBaseException){
			throw new RepositorioException("Erro na inserчуo.", $dataBaseException->getMensagem(), $sql );
			return false;
		}
	}

}

?>