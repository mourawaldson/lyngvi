<?php

require_once("Tela.php");

class TelaNoticiaEscolhida extends Tela {
	public function __construct(){
$titulo = $_SESSION['noticiaEscolhida']->getTitulo();
$texto = $_SESSION['noticiaEscolhida']->getTexto();
$datahora = $_SESSION['noticiaEscolhida']->getDataHora();
$dataf = substr($datahora,8,2).'/'.substr($datahora,5,2).'/'.substr($datahora,0,4).' '.substr($datahora,11,8);

		$conteudo .=
			'<h6 class="cor">'.$dataf.'</h6>
			<div id="noticiaExibida">
				<h5 class="cor">'.$titulo.'</h5>
				'.nl2br($texto).'
			</div> 
			<br /><br />
			<a href="#" onClick="return voltar();"><img alt="Voltar" src="./imgs/voltar.png" /></a>
			';

		parent::__construct("Notícia", $conteudo);
			$this->getHead()->addScript("./js/voltar.js");
			$this->getHead()->addEstilo("./css/noticias.css");
	}

	public function __toString(){
		parent::display();
		return '';
	}
}

?>