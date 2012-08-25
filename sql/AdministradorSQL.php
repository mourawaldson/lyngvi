<?php

class AdministradorSQL{

	static public function sqlInserir($login,$senha){
		return "INSERT INTO Administradores (Login,Senha) VALUES ( '".$login."','".md5( $senha )."')";
	}

	static public function sqlAlterar($login,$senha){
		return "UPDATE Administradores SET Senha = '".md5( $senha )."' where Login = '".$login."'";
	}

	static public function sqlExcluir($login){
		return "DELETE FROM Administradores WHERE Login = '".$login."'";
	}

	static public function sqlLogin($login){
		return "SELECT * FROM Administradores WHERE Login = '".$login."'";
	}

	static public function sqlLoginSenha($login,$senha){
		return "SELECT * FROM Administradores WHERE Login = '".$login."' AND Senha = '".md5( $senha )."'";
	}

	static public function sqlListar(){
		return "SELECT * FROM Administradores";
	}

}

?>