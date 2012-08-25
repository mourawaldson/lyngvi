<?php

class ConviteSQL{

//convido alguem para um desafio
	static public function sqlInserir($id_jogador_desafiante,$id_jogador_desafiado,$data){
	   	return "INSERT INTO convites (Id_Jogador_Desafiante,Id_Jogador_Desafiado,DataHora,Status) VALUES ( ".$id_jogador_desafiante.",".$id_jogador_desafiado.",'".$data."',0)";
	}

//se ja estou desafiando alguem, atualiza meu convite(substitui o outo convite).
	static public function sqlAlterar($id_jogador_desafiante,$id_jogador_desafiado,$data){
		return "UPDATE convites SET Id_Jogador_Desafiado = ".$id_jogador_desafiado.", DataHora = '".$data."', Status = 0  WHERE Id_Jogador_Desafiante = ".$id_jogador_desafiante;
	}

//verifica se ja estou desafiando alguem
	static public function sqlIdDesafiante($id_jogador_desafiante){
		return "SELECT * FROM convites WHERE Id_Jogador_Desafiante = ".$id_jogador_desafiante;
	}

//verifica se estou sendo desafiado
	static public function sqlIdDesafiado($id_jogador_desafiado){
		return "SELECT * FROM convites WHERE Id_Jogador_Desafiado = ".$id_jogador_desafiado." AND Status=0";
	}

//verifica se ainda existe O convite
	static public function sqlExistenciaConvite($id_jogador_desafiante,$id_jogador_desafiado){
		return "SELECT * FROM convites WHERE Id_Jogador_Desafiante = ".$id_jogador_desafiante." AND Id_Jogador_Desafiado = ".$id_jogador_desafiado;
	}

//retorna a lista de jogadores desafiaDOS
	static public function sqlIdJogadorDesafiante($id_jogador_desafiante){
		return "SELECT J.Id,J.Nome,J.Qtd_Partidas,J.Qtd_Vitorias,J.Url_Imagem,C.Data FROM convites C,Jogadores J WHERE C.Id_Jogador_Desafiado = J.Id AND C.Id_Jogador_Desafiante = ".$id_jogador_desafiante;
	}

//retorna a lista de jogadores desafiaNTES dos convites abertos
	static public function sqlIdJogadorDesafiado($id_jogador_desafiado){
		return "SELECT J.Id,J.Nome,J.Qtd_Partidas,J.Qtd_Vitorias,J.Url_Imagem,C.DataHora FROM Convites C,Jogadores J WHERE C.Id_Jogador_Desafiante = J.Id AND C.Status = 0 AND C.Id_Jogador_Desafiado = ".$id_jogador_desafiado;
	}

//cancela convite
	static public function sqlExcluir($id_jogador_desafiante,$id_jogador_desafiado){
		return "DELETE FROM convites WHERE Id_Jogador_Desafiante = ".$id_jogador_desafiante." AND Id_Jogador_Desafiado = ".$id_jogador_desafiado;
	}

//cancela convite ao deslogar
	static public function sqlExcluirDeslog($id_jogador_desafiado){
		return "DELETE FROM convites WHERE Id_Jogador_Desafiado = ".$id_jogador_desafiado;
	}

//aceita convite
	static public function sqlAlterarStatus($id_jogador_desafiante){
		return "UPDATE convites SET Status = 1 WHERE Id_Jogador_Desafiante = ".$id_jogador_desafiante;
	}

//verifica se convite foi aceito.
	static public function sqlConviteAceito($id_jogador_desafiante){
		return "SELECT * FROM Convites WHERE Id_Jogador_Desafiante = ".$id_jogador_desafiante." AND Status <> 0";
	}
}

?>