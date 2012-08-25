<?php

require_once("Tela.php");

abstract class TelaNaoLogado extends Tela {
	public function __construct($titulo, $conteudo){
		parent::__construct($titulo, $conteudo);
	}
}

?>