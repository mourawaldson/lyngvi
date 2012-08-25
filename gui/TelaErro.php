<?php

require_once("Tela.php");

class TelaErro extends Tela{
	public function __construct($msg){
		
		$conteudo = '
			<div id="erro">
				<img id="erro" alt="Erro: '.$msg.'" src="./imgs/erro.png" /> '.$msg.'
				<br /><br /><br />
				<a href="#" onClick="return voltar();"><img alt="Voltar" src="./imgs/voltar.png" /></a>
			</div>
		';

		parent::__construct("Erro",$conteudo);
			$this->getHead()->addEstilo("./css/erro.css");
			$this->getHead()->addScript("./js/voltar.js");
		}
		
		public function __toString(){
		parent::display();
		return '';
	}
}

?>