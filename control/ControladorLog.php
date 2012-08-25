<?php

require_once("./util/Repositorio.php");
require_once("./sql/LogSQL.php");

class ControladorLog{
	
	static public function baralhosVencedores($id){
		try{
			$array = Repositorio::Carregar( LogSQL::SQLListarBaralhoVencedor( $id ) );
			return $array;
		}catch(RepositorioException $repE){
			echo $this->setErro($repE->getMensagem());
			return false;
		}
	}
}
?>
