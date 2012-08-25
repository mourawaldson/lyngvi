<?php

require_once("./gui/Tela.php");

class TelaLogarAdministrador extends Tela {
	public function __construct(){
		$conteudo ='
		<fieldset id="cadastro">
			<form id="formLoginAdm" name="formLoginAdm" method="post" action="index.php?acao=logarAdministrador">
				<img id="seguranca" src="./imgs/seguranca.png" />
				<legend id="legenda">Login dos Administradores&nbsp;</legend><br />
				<label>Login: </label>
				<input class="campos" type="text" name="login" /><br /><br />
				<label>Senha: </label>
				<input class="campos" type="password" name="senha" /><br /><br />
				<input id="botoesFormulario" class="botoesMenu" type="submit" name="Submit" value="Logar" />
				<br /><br />
				<a href="#" onClick="return voltar();"><img alt="Voltar" src="./imgs/voltar.png" /></a>
			</form>
		</fieldset>
		';

			parent::__construct("Login dos Administradores", $conteudo);
			$this->getHead()->addScript("./js/voltar.js");
		}
	
		public function __toString(){
			parent::display();
			return '';
		}
}

?>