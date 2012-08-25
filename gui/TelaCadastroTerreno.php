<?php

require_once("Tela.php");

class TelaCadastroTerreno extends Tela {
	public function __construct(){
		$conteudo ='
			<fieldset id="cadastro">
				<form id="formCadastro" name="formCadastro" method="post" action="index.php?acao=cadastrarTerreno">
					<legend id="legenda">Cadastro dos Terrenos&nbsp;</legend><br />
					<label>Nome: </label>
					<input class="campos" type="text" name="nome" /><br /><br />
					<br />
					<input id="botoesFormulario" class="botoesMenu" type="submit" name="Submit" value="Cadastrar" /><br /><br />
					<a href="#" onClick="return voltar();"><img alt="Voltar" src="./imgs/voltar.png" /></a>
				</form>
			</fieldset>
			';
	
			parent::__construct("Cadastrar Terrenos", $conteudo);
			$this->getHead()->addScript("./js/voltar.js");
		}
	
		public function __toString(){
			parent::display();
			return '';
		}
}

?>