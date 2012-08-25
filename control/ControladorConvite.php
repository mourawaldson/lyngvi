<?php

require_once("./util/Repositorio.php");
require_once("./sql/ConviteSQL.php");

class ControladorConvite{

	static public function convidarJogador($id_jogador_desafiante,$id_jogador_desafiado) {
		try{//convido alguem para um desafio
			Repositorio::Inserir( ConviteSQL::sqlInserir($id_jogador_desafiante,$id_jogador_desafiado,date('YmdHis') ) );
		}catch(RepositorioException $repE){
			echo $repE->getMensagem();
		}
	}

	static public function verificarJogadorDesafiante($id_jogador_desafiante) {
		try{//verifica se ja estou desafiando alguem
			if(Repositorio::QtdRegistros(ConviteSQL::sqlIdDesafiante($id_jogador_desafiante) ) == 1){
				return true;
			}else{
				return false;
			}
		}catch(RepositorioException $repE){
			echo $this->setErro($repE->getMensagem());
			return false;
		}
	}
	
	static public function idJogadorDesafiado($id_jogador_desafiante) {
		try{//verifica se ja estou desafiando alguem
			$resultado = Repositorio::Registros(ConviteSQL::sqlIdDesafiante($id_jogador_desafiante) ); 
			return $resultado;
		}catch(RepositorioException $repE){
			echo $this->setErro($repE->getMensagem());
			return false;
		}
	}

	static public function atualizarJogadorDesafiado($id_jogador_desafiante,$id_jogador_desafiado) {
		try{//se ja estou desafiando alguem, atualiza meu convite(substitui o id do disafiado).
			Repositorio::Alterar( ConviteSQL::sqlAlterar( $id_jogador_desafiante,$id_jogador_desafiado,date('YmdHis') ) );
		}catch(RepositorioException $repE){
			echo $repE->getMensagem();
		}
	}

	static public function verificarJogadorDesafiado($id_jogador_desafiado) {
		try{//verifica se estou sendo desafiado
			if(Repositorio::QtdRegistros(ConviteSQL::sqlIdDesafiado($id_jogador_desafiado) ) > 0){
				return true;
			}else{
				return false;
			}
		}catch(RepositorioException $repE){
			echo $this->setErro($repE->getMensagem());
			return false;
		}
	}

	static public function cancelarConviteJogador($id_jogador_desafiante,$id_jogador_desafiado){
		try{//cancela convite
			Repositorio::Excluir( ConviteSQL::sqlExcluir($id_jogador_desafiante,$id_jogador_desafiado) );	
		}catch(RepositorioException $repE){
			echo $repE->getMensagem();
		}
	}
	
	static public function cancelarConviteJogadorDeslog($id_jogador_desafiado){
		try{//cancela convite ao deslogar o jogador
			Repositorio::Excluir( ConviteSQL::sqlExcluirDeslog($id_jogador_desafiado) );
		}catch(RepositórioException $repE){
			echo $repE->getMensagem();
		}
	}
	
	static public function existenciaConvite($id_jogador_desafiante,$id_jogador_desafiado){
		try{//verifica se ainda existe O convite
			if(Repositorio::QtdRegistros( ConviteSQL::sqlExistenciaConvite($id_jogador_desafiante,$id_jogador_desafiado) ) > 0){
				return true;
			}else{
				return false;
			}
		}catch(RepositorioException $repE){
			echo $repE->getMensagem();
		}
	}

	static public function verificaConviteAceito($id_jogador_desafiante){
		try{//verifica se o convite enviado foi aceito
			if(Repositorio::QtdRegistros( ConviteSQL::sqlConviteAceito($id_jogador_desafiante) ) > 0){
				return true;
			}else{
				return false;
			}
		}catch(RepositorioException $repE){
			echo $repE->getMensagem();
		}
	}

	static public function listarJogadoresDesafiantes($id_jogador_desafiado){
		try{//retorna a lista de jogadores desafiaNTES
			$arrayjogadoresdesafiantes = Repositorio::Carregar( ConviteSQL::sqlIdJogadorDesafiado($id_jogador_desafiado) );
			return $arrayjogadoresdesafiantes;
		}catch(RepositorioException $repE){
			echo $repE->getMensagem();
		}
	}

	static public function aceitarConvite($id_jogador_desafiante){
		try{//aceita convite
			Repositorio::Alterar( ConviteSQL::sqlAlterarStatus($id_jogador_desafiante) );
		}catch(RepositorioException $repE){
			echo $repE->getMensagem();
		}
	}
}

?>