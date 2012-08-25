<?php

class JogadoresLogadosSQL{

	static public function sqlInserir($id_usuario,$id_jogador,$data){
		return "INSERT INTO Jogadores_Logados (Id_Usuario,Id_Jogador,DataHora) VALUES ( ".$id_usuario.",".$id_jogador.",'".$data."')";
	}

	static public function sqlAlterar($id_usuario,$id_jogador,$data){
		return "UPDATE Jogadores_Logados SET Id_Jogador = ".$id_jogador.", DataHora = '".$data."'  where Id_Usuario = ".$id_usuario;
	}

	static public function sqlId($id_usuario){
		return "SELECT * FROM Jogadores_Logados WHERE Id_Usuario = ".$id_usuario;
	}
	
	static public function sqlIdJogador($id_jogador){
		return "SELECT J.Id,J.Nome,J.Qtd_Partidas,J.Qtd_Vitorias,J.Url_Imagem FROM Jogadores_Logados JL,Jogadores J WHERE JL.Id_Jogador = J.Id AND JL.Id_Jogador <> ".$id_jogador;
	}
		
	static public function sqlExcluir($id_jogador){
		return "DELETE FROM Jogadores_Logados WHERE Id_Jogador = ".$id_jogador;
	}

}

?>