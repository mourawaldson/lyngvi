<?php

class LogSQL{
	static public function SQLListarBaralhoVencedor($meuid){
		return "SELECT * FROM round r,baralho b WHERE r.Id_Baralho_Vencedor = b.Id AND b.Id_Jogador = ".$meuid;

	}
}

?>