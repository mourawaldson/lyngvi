<?php

class BatalhaSQL{
	static public function sqlCriar($id_desafiante){
	   	return "INSERT INTO batalha (Id_Jogador_Desafiante) VALUES (".$id_desafiante.")";
	}
	
	static public function sqlCriarRound($id,$id_batalha,$id_baralho_vencedor,$id_baralho_perdedor){
		return "INSERT INTO Round (Id,Id_Batalha,Id_Baralho_Vencedor,Id_Baralho_Perdedor) VALUES (".$id.", ".$id_batalha.", ".$id_baralho_vencedor.",".$id_baralho_perdedor.")";
	}
	
	static public function sqlAlterar($id,$Id_Jogador_Vencedor,$Id_Jogador_Perdedor,$status){
		return "UPDATE Batalha SET Id_Jogador_Vencedor = ".$Id_Jogador_Vencedor.", Id_Jogador_Perdedor = ".$Id_Jogador_Perdedor.", Status = ".$status." where Id_Jogador_Desafiante = ".$id;
	}

	static public function sqlExcluirBatalha($id){
		return "DELETE FROM Batalha WHERE Batalha.Id_Jogador_Desafiante = ".$id;
		
	}
	static public function sqlExcluirRound($id){
		return "DELETE FROM Round WHERE Round.Id_Batalha = ".$id;

	}

	static public function sqlListarBatalhaId($id_desafiante){
		return "SELECT * FROM batalha WHERE Id_Jogador_Desafiante = ".$id_desafiante;
	}

	static public function sqlListarBatalhaIdStatus($id_desafiante){
		return "SELECT * FROM batalha WHERE Id_Jogador_Desafiante = ".$id_desafiante." AND Status = 1";
	}

}

?>