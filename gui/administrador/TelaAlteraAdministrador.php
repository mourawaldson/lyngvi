<?php

require_once("./gui/Tela.php");

class TelaAlteraAdministrador extends Tela {
	public function __construct(){
		$conteudo ='
		<fieldset id="cadastro">
			<form id="formCadastro" name="formCadastro" method="post" action="index.php?acao=alterarAdministrador">
				<img id="seguranca" src="./imgs/seguranca.png" />
				<legend id="legenda">Alterar Administrador&nbsp;</legend><br />
				<label>Nova Senha: </label>
				<input class="campos" type="password" name="novasenha" /><br /><br />
				<input id="botoesFormulario" class="botoesMenu" type="submit" name="Submit" value="Alterar" />
				<br /><br />
				<a href="#" onClick="return voltar();"><img alt="Voltar" src="./imgs/voltar.png" /></a>
			</form>
		</fieldset>
		';

			parent::__construct("Alterar Administrador", $conteudo);
			$this->getHead()->addScript("./js/voltar.js");
		}
	
		public function __toString(){
			parent::display();
			return '';
		}
}

?>