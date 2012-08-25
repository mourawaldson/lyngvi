<?php

class UsuarioSQL{
	
	static public function sqlInserir($login, $senha,$email){
		return "INSERT INTO Usuarios (Login,Senha,Email) VALUES ( '".$login."','".md5( $senha )."','".$email."')";
	}

	static public function sqlAlterar($login, $senha,$email){
		return "UPDATE Usuarios SET Senha = '".md5( $senha )."', Email = '".$email."'  where Login = '".$login."'";
	}

	static public function sqlExcluir($id){
		return "DELETE FROM Usuarios WHERE Id = ".$id;
	}

	static public function sqlId($id){
		return "SELECT * FROM Usuarios WHERE Id = ".$id;
	}

	static public function sqlLogin($login){
		return "SELECT * FROM Usuarios WHERE Login = '".$login."'";
	}

	static public function sqlLoginSenha($login,$senha){
		return "SELECT * FROM Usuarios WHERE Login = '".$login."' AND Senha = '".md5( $senha )."'";
	}

	static public function sqlEmail($email){
		return "SELECT * FROM Usuarios WHERE Email = '".$email."'";
	}

	static public function sqlListar(){
		return "SELECT * FROM Usuarios";
	}

	static public function sqlListarJogadoresUsuario($id){
		return "SELECT * FROM Jogadores WHERE Jogadores.Id_Usuario = ".$id;
	}

}

?>