<?php
	class Administrador {
		private $login;
		private $senha;
		private $id;

		public function __construct($login,$senha,$id = null){
       		$this->login = $login;
			$this->senha = $senha;
			$this->id = $id;
		}
		
		public function __toString() {
			$string  = "\n";
			$string .= "Administrador:\n";
			$string .= "\tId: ".$this->getId()."\n";
			$string .= "\tLogin: ".$this->getLogin()."\n";
			$string .= "\tSenha: ".$this->getSenha()."\n";

			return $string;
		}

		function getLogin(){
			return $this->login;
		}

		function getSenha(){
			return $this->senha;
		}
		
		function getId(){
			return $this->id;
		}

		function setLogin($login){
			$this->login = $login;
		}

		function setSenha($senha){
			$this->senha = $senha;
		}
		
		function setId($id){
			$this->id = $id;
		}

	}

?>