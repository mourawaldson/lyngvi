<?php

class JogadorSQL{

	static public function sqlInserir($id_usuario,$nome,$imagem){
		return "INSERT INTO Jogadores (Id_Usuario,Nome,Qtd_Partidas, Qtd_Vitorias,Dinheiro,Url_Imagem) VALUES (".$id_usuario.",'".$nome."',0,0,300,'".$imagem."')";
	}

	static public function sqlAlterar($id,$qtd_partidas,$qtd_vitorias,$dinheiro){
		return "UPDATE Jogadores SET Qtd_Partidas = ".$qtd_partidas.", Qtd_Vitorias = ".$qtd_vitorias.", Dinheiro = ".$dinheiro." where Id = ".$id;
	}

	static public function sqlExcluir($id){
		return "DELETE FROM Jogadores WHERE Id = ".$id;
	}

	static public function sqlVerificaNome($nome){
		return "SELECT * FROM Jogadores WHERE Nome = '".$nome."'";
	}

	static public function sqlVerificaId($id){
		return "SELECT * FROM Jogadores WHERE Id = ".$id;
	}

	static public function sqlListar(){
		return "SELECT * FROM Jogadores";
	}
}