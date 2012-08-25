<?php

class ControladorXml{
	private $path = './xml/ ';
	private $cabecalho = '<?xml version="1.0" encoding="iso-8859-1"?>';
	private $xml;
	private $arquivo;
	private $jogador_vez;
	private $jogador_inimigo;
	
	public function __construct($jogador_vez,$jogador_inimigo){
		$this->jogador_vez = $jogador_vez;
		$this->jogador_inimigo = $jogador_inimigo;
		$this->arquivo = $this->path.$this->jogador_vez->getNome().'.xml';
	}
	
	//inicio dos getters and setters
	public function getPath(){
		return $this->path;
	}
	public function setPath($path){
		$this->path = $path;
	}
	public function getCabecalho(){
		return $this->cabecalho;
	}
	public function setCabecalho($cabecalho){
		$this->cabecalho = $cabecalho;
	}
	public function getXml(){
		return $this->Xml;
	}
	public function setXml($xml){
		$this->xml = $xml;
	}
	public function getArquivo(){
		return $this->arquivo;
	}
	public function setArquivo($arquivo){
		$this->arquivo = $arquivo;
	}	
	public function getJogador_vez(){
		return $this->jogador_vez;
	}
	public function setJogador_vez($jogador_vez){
		$this->jogador_vez = $jogador_vez;
	}
	public function getJogador_inimigo(){
		return $this->jogador_inimigo;
	}
	public function setJogador_inimigo($jogador_inimigo){
		$this->jogador_inimigo = $jogador_inimigo;
	}
	//termino dos getters and setters
	
	
	private function montarXml(){
		$this->xml = $this->cabecalho;		
		$this->xml .="<jogador1>
			<id>".$this->jogador_vez->getId()."</id>
			<nome>".$this->jogador_vez->getNome()."</nome>
			<partidas>".$this->jogador_vez->getPartidas()."</partidas>
			<vitorias>".$this->jogador_vez->getVitorias()."</vitorias>
			<dinheiro>".$this->jogador_vez->getDinheiro()."</dinheiro>";
		foreach($this->jogador_vez->getBaralho() as $carta){
			$this->xml.="
			<carta id=\"".$carta['id']."\">
				<hp>".$carta['hp']."</hp>
				<ataque>".$carta['ataque']."</ataque>
				<defesa>".$carta['defesa']."</defesa>
				<nivel>".$carta['nivel']."</nivel>
				<level>".$carta['level']."</level>
				<experiencia>".$carta['experiencia']."</experiencia>
				<terreno>".$carta['terreno']."</terreno>
			</carta>";
		}			
		$this->xml .="
			<inimigo>".$this->jogador_inimigo->getNome()."</inimigo>
			
		</jogador1>";
	}
	
	public function verificarXml(){
		if (!file_exists($this->arquivo)){
			return true;
		}else return false;
	}
	
	private function abrirXml(){
		if (!$this->arquivo = fopen($this->arquivo, "w")) {
			 return false;
			 echo  "Erro ao abrir o arquivo ($this->arquivo)";
			 //criar exceptions
		}
	}
	
	private function escreverXml(){	
		if (!fwrite($this->arquivo, $this->xml)) {
			return false;
			echo "Erro escrevendo no arquivo ($this->arquivo)";
			//criar exceptions
		}
	}
	
	private function fecharXml(){
		fclose($this->arquivo);
	}
	
	public function gerarXml(){
		$this->montarXml();
		$this->abrirXml();
		$this->escreverXml();
		$this->fecharXml();
	}

}


?>