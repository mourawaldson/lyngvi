<?php

require_once("./gui/Tela.php");

class TelaCadastroUsuario extends Tela {
	public function __construct(){
		$conteudo ='
		<fieldset id="cadastro">
			<form id="formCadastro" name="formCadastro" method="post" action="index.php?acao=cadastrarUsuario">
				<img id="seguranca" src="./imgs/seguranca.png" />
				<legend id="legenda">Cadastro de Usuários&nbsp;</legend><br />
				<label>Login: </label>
				<input class="campos" type="text" name="login" /><br /><br />
				<label>Senha: </label>
				<input class="campos" type="password" name="senha" /><br /><br />
				<label>Email: </label>
				<input class="campos" type="text" name="email" /><br /><br />
				<input id="botoesFormulario" class="botoesMenu" type="submit" name="Submit" value="Cadastrar" />
				<br /><br />
				<a href="#" onClick="return voltar();"><img alt="Voltar" src="./imgs/voltar.png" /></a>
			</form>
		</fieldset>
		';

			parent::__construct("Cadastrar Usuário", $conteudo);
			$this->getHead()->addScript("./js/voltar.js");
		}
	
		public function __toString(){
			parent::display();
			return '';
		}
}

?>