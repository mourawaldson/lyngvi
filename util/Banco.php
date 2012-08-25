<?php

require_once("./exception/BancoException.php");

class Banco{
	private $database;
	private $username;
	private $password;
	private $hostname;
	private $conexao;
	private $result;

	public function __construct($database='lyngviBanco', $username='root', $password='', $hostname='localhost'){
		$this->setDatabase($database);
		$this->setUsername($username);
		$this->setPassword($password);
		$this->setHostname($hostname);

		$this->conectar();
	}

	private function conectar(){

	if( !$this->conexao = mysql_connect($this->getHostname(), $this->getUsername(), $this->getPassword()) )
		throw new BancoException("Falha na conexao.", mysql_error() );

		if (!mysql_select_db($this->getDatabase()) )
			throw new BancoException("Falha ao selecionar o banco.".$this->getDatabase() , mysql_error() );
	}

	private function desconectar(){
		mysql_close($this->conexao);
	}

	public function getNumRows(){
		return mysql_num_rows( $this->result );
	}

	public function selectSQL($sql){
		if( !$this->result =  mysql_query($sql) )
		throw new BancoException("Falha na query", mysql_error() );
	}

	public function executeSQL( $sql ){
		if (!mysql_query($sql))
			throw new BancoException("Falha em executar consulta - executeSQL.", mysql_error() );
	}

/*	public function liberarSQL(){
		mysql_free_result($result);
	}
*/
	private function setDatabase( $valor ){
		$this->database = $valor;
	}

	private function setUsername( $valor ){
		$this->username = $valor;
	}

	private function setPassword( $valor ){
		$this->password = $valor;
	}

	private function setHostname( $valor ){
		$this->hostname = $valor;
	}

	private function getDatabase(){
		return $this->database;
	}

	private function getUsername(){
		return $this->username;
	}

	private function getPassword(){
		return $this->password;
	}

	private function getHostname(){
		return $this->hostname;
	}

	private function setResult( $valor ){
		$this->result = $valor;
	}

	public function getResult(){
		$retorno = array();

		while( $linha = mysql_fetch_array($this->result, MYSQL_ASSOC) ){
			array_push($retorno, $linha);
		}

		return $retorno;
	}

	public function executeSQLKeys( $sql ){
		if (mysql_query($sql)){
			return mysql_insert_id();
		}else{
			throw new BancoException("Falha em executar consulta - executeSQL.", mysql_error() );
		}
	}

}

?>