<?php

require_once("./util/Repositorio.php");
require_once("./sql/BatalhaSQL.php");

class ControladorBatalha{
	private $batalha;
	private $pontos1;
	private $pontos2;
	private $empate;
	private $erro;

	function __construct( $batalha=null ){
		$this->batalha = $batalha ;
	}

	private function setBatalha( $valor ){
		$this->batalha = $valor;
	}

	public function getBatalha(){
		return $this->batalha;
	}

	private function setErro($msg){
		$this->erro = $msg;
	}

	public function getErro(){
		return 	$this->erro;
	}

	static public function gerarRound($id_teu,$id_dele){
		$meubaralho = new Baralho($id_teu);
		$meubaralhocontrolado = new ControladorBaralho($meubaralho);
		$meubaralhocontrolado->carregarBaralho();
		$meubaralho = $meubaralhocontrolado->getBaralho();

		$oponentebaralho = new Baralho($id_dele); 
		$oponentebaralhocontrolado = new ControladorBaralho($oponentebaralho);
		$oponentebaralhocontrolado->carregarBaralho();
		$oponentebaralho = $oponentebaralhocontrolado->getBaralho();
		return (new Round($meubaralho->getId(),$meubaralho,$oponentebaralho));
	}

	static public function criarBatalha($id){
		try{
			Repositorio::Inserir( BatalhaSQL::sqlCriar($id) );
			return true;
		}catch(RepositorioException $repE){
			return false;
			echo $repE->getMensagem();
		}
	}
	
	public function criarRounds(){
		try{
			$id = $this->batalha->getRound1()->getId();
			$id_batalha = $this->batalha->getId();
			$arrayvencedorperdedor = @$this->batalha->getRound1()->getArrayvencedorperdedor();
			$id_vencedor = @$arrayvencedorperdedor['vencedor']->getId();
			$id_perdedor = @$arrayvencedorperdedor['perdedor']->getId();
			Repositorio::Inserir( BatalhaSQL::sqlCriarRound($id,$id_batalha,$id_vencedor,$id_perdedor) );

			$id = $this->batalha->getRound2()->getId();
			$arrayvencedorperdedor = @$this->batalha->getRound2()->getArrayvencedorperdedor();
			$id_vencedor = @$arrayvencedorperdedor['vencedor']->getId();
			$id_perdedor = @$arrayvencedorperdedor['perdedor']->getId();
			Repositorio::Inserir( BatalhaSQL::sqlCriarRound($id,$id_batalha,$id_vencedor,$id_perdedor) );
			
			$id = $this->batalha->getRound3()->getId();
			$id_batalha = $this->batalha->getId();
			$arrayvencedorperdedor = @$this->batalha->getRound3()->getArrayvencedorperdedor();
			$id_vencedor = @$arrayvencedorperdedor['vencedor']->getId();
			$id_perdedor = @$arrayvencedorperdedor['perdedor']->getId();
			Repositorio::Inserir( BatalhaSQL::sqlCriarRound($id,$id_batalha,$id_vencedor,$id_perdedor) );
			return true;
		}catch(RepositorioException $repE){
			return false;
			echo $repE->getMensagem();
		}
	}

	static public function verificaExistencia($id_jogador){
		try{
			if (Repositorio::QtdRegistros( BatalhaSQL::sqlListarBatalhaId($id_jogador)) == 1){
				return true;
			}else{
				return false;
			}
		}catch(RepositorioException $repE){
			echo $repE->getMensagem();
			return false;
		}
	}

	static public function verificaStatus($id_jogador){
		try{
			if (Repositorio::QtdRegistros( BatalhaSQL::sqlListarBatalhaIdStatus($id_jogador)) == 1){
				return true;
			}else{
				return false;
			}
		}catch(RepositorioException $repE){
			echo $repE->getMensagem();
			return false;
		}
	}

	static public function excluirBatalha($id_batalha){
		try{
			Repositorio::Excluir( BatalhaSQL::sqlExcluirBatalha($id_batalha) );
			return true;
		}catch(RepositorioException $repE){
			return false;
			echo $repE->getMensagem();
		}
	}
		static public function excluirRound($id_Round){
		try{
			Repositorio::Excluir( BatalhaSQL::sqlExcluirRound($id_Round) );
			return true;
		}catch(RepositorioException $repE){
			return false;
			echo $repE->getMensagem();
		}
	}
	
	public function alterarBatalha(){
		try{
		//	if( Repositorio::QtdRegistros( BatalhaSQL::sqlListarBatalhaId($this->batalha->getJogador1()->getId()) == 1) ){
				$id = $this->batalha->getJogador1()->getId();
				$Id_Jogador_Vencedor = $this->batalha->getVencedor()->getId();
				$Id_Jogador_Perdedor = $this->batalha->getPerdedor()->getId();
				$status = 1;
				Repositorio::Alterar( BatalhaSQL::sqlAlterar($id,$Id_Jogador_Vencedor,$Id_Jogador_Perdedor,$status ) );
				return true;
		//	}else{
		//		return false;
		//	}
		}catch(RepositorioException $repE){
			echo $repE->getMensagem();
		}
	}
	
	public function executarBatalha(){
		//primeiro round
		$carta1 = $this->batalha->getRound1()->getBaralho1();
		$carta2 = $this->batalha->getRound1()->getBaralho2();
		$this->batalha->getRound1()->setArrayvencedorperdedor($this->executarRound($carta1,$carta2));

		//segundo round
		$carta1 = $this->batalha->getRound2()->getBaralho1();
		$carta2 = $this->batalha->getRound2()->getBaralho2();
		$this->batalha->getRound2()->setArrayvencedorperdedor($this->executarRound($carta1,$carta2));

		//terceiro round
		$carta1 = $this->batalha->getRound3()->getBaralho1();
		$carta2 = $this->batalha->getRound3()->getBaralho2();
		$this->batalha->getRound3()->setArrayvencedorperdedor($this->executarRound($carta1,$carta2));
		
		$this->contabilizarVencedor();
	}

	public function executarRound($carta1,$carta2){
		$carta1->verificarTerreno($this->batalha->getTerreno());
		$carta2->verificarTerreno($this->batalha->getTerreno());
		do{
			//ataque da 1ª carta & defesa da 2ª carta
			$hpaux = $carta2->getHp();
			$danoaux = $carta1->atacar() - $carta2->defender();
			
			$carta2->setHp($hpaux - $danoaux);
			
			//ataque da 2ª carta & defesa da 1ª carta
			$hpaux = $carta1->getHp();
			$danoaux = $carta2->atacar() - $carta1->defender();
			
			$carta1->setHp($hpaux - $danoaux);
		}while(($carta1->getHp() >= 0) || ($carta2->getHp() >= 0) || $carta1->getHp()==$carta2->getHp());
				if ($carta1->getHp() < $carta2->getHp()){
					$this->pontos2+=1;
					return array("vencedor" => $carta2,"perdedor" =>$carta1);
				}elseif($carta1->getHp() > $carta2->getHp()){
					$this->pontos1+=1;
					return array("vencedor" => $carta1,"perdedor" =>$carta2);
				}else{
					$this->empate+=1;
					return array("vencedor" => 0,"perdedor" =>0);
				}
	}

	function contabilizarVencedor(){
		$this->batalha->getJogador1()->setPartidas($this->batalha->getJogador1()->getPartidas()+ 1);
		$this->batalha->getJogador2()->setPartidas($this->batalha->getJogador2()->getPartidas()+ 1);
		if ($this->pontos1 > $this->pontos2){
			$this->batalha->getJogador1()->setVitorias($this->batalha->getJogador1()->getVitorias()+ 1);
			$this->batalha->getJogador1()->setDinheiro($this->batalha->getJogador1()->getDinheiro()+150*$this->pontos1);
			$this->batalha->getJogador2()->setDinheiro($this->batalha->getJogador2()->getDinheiro()+50*$this->pontos2);
			$this->batalha->setVencedor($this->batalha->getJogador1());
			$this->batalha->setPerdedor($this->batalha->getJogador2());
		}elseif($this->pontos1 < $this->pontos2){
			$this->batalha->getJogador2()->setVitorias($this->batalha->getJogador2()->getVitorias()+ 1);
			$this->batalha->getJogador2()->setDinheiro($this->batalha->getJogador2()->getDinheiro()+150*$this->pontos2);
			$this->batalha->getJogador1()->setDinheiro($this->batalha->getJogador1()->getDinheiro()+50*$this->pontos1);
			$this->batalha->setVencedor($this->batalha->getJogador2());
			$this->batalha->setPerdedor($this->batalha->getJogador1());
		}else{
			$this->batalha->setVencedor(new Jogador(0));
			$this->batalha->setPerdedor(new Jogador(0));
			$this->batalha->getJogador1()->setDinheiro($this->batalha->getJogador1()->getDinheiro()+50*($this->pontos1 + $this->empate));
			$this->batalha->getJogador2()->setDinheiro($this->batalha->getJogador2()->getDinheiro()+50*($this->pontos2 + $this->empate));
		}
	}
}

?>