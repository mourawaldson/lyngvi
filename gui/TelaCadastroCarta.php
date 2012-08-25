<?php

require_once("Tela.php");

class TelaCadastroCarta extends Tela {
	public function __construct(){
		$conteudo ='
			<fieldset id="cadastro">
				<form id="formCadastro" name="formCadastro" method="post" action="index.php?acao=cadastrarCarta">
					<legend id="legenda">Cadastro das Cartas&nbsp;</legend><br />
					<label>Nome: </label>
					<input class="campos" type="text" name="ednome" /><br /><br />
					<br />
					<input id="botoesFormulario" class="botoesMenu" type="submit" name="Submit" value="Cadastrar" /><br /><br />
					<a href="#" onClick="return voltar();"><img alt="Voltar" src="./imgs/voltar.png" /></a>
				</form>
			</fieldset>
			';
	
			parent::__construct("Cadastrar Cartas", $conteudo);
			$this->getHead()->addScript("./js/voltar.js");
		}
	
		public function __toString(){
			parent::display();
			return '';
		}
}

?>