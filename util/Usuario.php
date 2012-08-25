<?php

	class Usuario{
		private $login;
		private $senha;
		private $email;
		private $id;
		private $jogadores;

		public function __construct($login,$senha,$email = null, $id = null, $jogadores = null){
       		$this->login = $login;
			$this->senha = $senha;
			$this->email = $email;
		 	$this->id = $id;
			$this->jogadores = $jogadores;
		}

		public function __toString() {
			$string  = "\n";
			$string .= "Usuário:\n";
			$string .= "\tId: ".$this->getId()."\n";
			$string .= "\tE-mail: ".$this->getEmail()."\n";
			$string .= "\tLogin: ".$this->getLogin()."\n";
			$string .= "\tSenha: ".$this->getSenha()."\n";
			$string .= "\tJogadores: ".$this->getJogadores()."\n";

			return $string;
		}

		function getLogin(){
			return $this->login;
		}

		function getSenha(){
			return $this->senha;
		}

		function getEmail(){
			return $this->email;
		}

		function getId(){
			return $this->id;
		}

		function getJogadores(){
			return $this->jogadores;
		}

		function setLogin($login){
			$this->login = $login;
		}

		function setSenha($senha){
			$this->senha = $senha;
		}

		function setEmail($email){
			$this->email = $email;
		}

		function setId($id){
			$this->id = $id;
		}

		function setJogadores($jogadores){
			$this->jogadores = $jogadores;
		}

	}

?>