<?php

class CartasEscolhidasSQL{
	static public function sqlInserir($id_jogador,$id_baralho1,$id_baralho2,$id_baralho3){
	   	return "INSERT INTO cartas_escolhidas (id_jogador,id_baralho1,id_baralho2,id_baralho3) VALUES ( ".$id_jogador.",".$id_baralho1.",".$id_baralho2.",".$id_baralho3.")";
	}
	
	static public function sqlAlterar($id_jogador,$id_baralho1,$id_baralho2,$id_baralho3){
		return "UPDATE cartas_escolhidas SET id_baralho1 = ".$id_baralho1.", id_baralho2 = ".$id_baralho2.", id_baralho3 = ".$id_baralho3."  WHERE id_jogador = ".$id_jogador;
	}
	
	static public function sqlExcluir($id_jogador){
		return "DELETE FROM cartas_escolhidas WHERE id_jogador = ".$id_jogador;
	}
	
	static public function sqlListar($id_jogador){
		return "SELECT * FROM cartas_escolhidas WHERE id_jogador = ".$id_jogador;
	}
}

?>