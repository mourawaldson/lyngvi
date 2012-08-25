<?php
require_once("./util/Repositorio.php");
require_once("./sql/CartasEscolhidasSQL.php");

class ControladorCartasEscolhidas{

	static public function registraCartasEscolhidas($id_jogador,$id_baralho1,$id_baralho2,$id_baralho3) {
		try{
			Repositorio::Inserir( CartasEscolhidasSQL::sqlInserir($id_jogador,$id_baralho1,$id_baralho2,$id_baralho3 ) );
		}catch(RepositorioException $repE){
			echo $repE->getMensagem();
		}
	}
	
	static public function alterarCartasEscolhidas($id_jogador,$id_baralho1,$id_baralho2,$id_baralho3){
		try{
			Repositorio::Alterar( CartasEscolhidasSQL::sqlAlterar($id_jogador,$id_baralho1,$id_baralho2,$id_baralho3) );
		}catch(RepositorioException $repE){
			echo $repE->getMensagem();
		}
	}
	
	static public function desregistrar($id_jogador){
		try{
			Repositorio::Excluir( CartasEscolhidasSQL::sqlExcluir($id_jogador) );	
		}catch(RepositorioException $repE){
			echo $repE->getMensagem();
		}
	}
	
	static public function verificaExistencia($id_jogador){
		try{
			if (Repositorio::QtdRegistros( CartasEscolhidasSQL::sqlListar($id_jogador)) == 1){
				return true;
			}else{
				return false;
			}
		}catch(RepositorioException $repE){
			echo $repE->getMensagem();
			return false;
		}
	}
	
	static public function registrosCartasEscolhidas($id_jogador){
		try{
			$arraybaralho = Repositorio::Carregar( CartasEscolhidasSQL::sqlListar($id_jogador) );
			return $arraybaralho;
		}catch(RepositorioException $repE){
			echo $repE->getMensagem();
			return false;
		}
	}
	
}
?>
