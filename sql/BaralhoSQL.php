<?php

class BaralhoSQL{

	static public function sqlInserir($id_jogador,$id_carta,$hp,$ataque,$defesa,$level,$experiencia){
		return "INSERT INTO Baralho (Id_Jogador, Id_Carta, HP, Ataque, Defesa, Level, Experiencia) VALUES ( ".$id_jogador.",".$id_carta.",".$hp.",".$ataque.",".$defesa.",".$level.",".$experiencia.")";
	}

	static public function sqlListarBaralhoJogador($id_jogador){
		return "SELECT b.id,b.hp,b.ataque,b.defesa,c.nivel,b.level,b.experiencia,c.nome,c.url_imagem,te.nome as terreno,ti.nome as tipo from baralho b,cartas c,terrenos te,tipos ti where c.id = b.id_carta and te.id = c.id_terreno and ti.id = c.id_tipo and b.id_jogador = ".$id_jogador;
	}
	
	static public function sqlExcluir($id_jogador){
		return "DELETE FROM Baralho WHERE Id_Jogador = ".$id_jogador;
	}
	
	static public function sqlAlterar($id,$id_carta,$hp,$ataque,$defesa,$level,$experiencia){
		return "UPDATE Baralho SET Id_Carta = ".$id_carta.", HP = ".$hp.", Ataque = ".$ataque.", Defesa = ".$defesa.", Level = ".$level.", Experiencia = ".$experiencia." where Id = ".$id;
	}
	
	static public function sqlVerificaId($id){
		return "SELECT * FROM Baralho WHERE Id = ".$id;
	}
}

?>