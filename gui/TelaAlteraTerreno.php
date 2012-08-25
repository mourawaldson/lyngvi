<?php

require_once("./gui/Tela.php");

class TelaAlteraTerreno extends Tela {
	public function __construct(){
		$conteudo ='
		<fieldset id="cadastro">
			<form id="frm" name="formCadastro" method="post" action="index.php?acao=alterarTerreno">
				<img id="seguranca" src="./imgs/seguranca.png" />
				<legend id="legenda">Alterar Terreno&nbsp;</legend><br />
				<label>Novo Nome: </label>
				<input class="campos" type="text" name="novonome" /><br /><br />
				<input id="botoesFormulario" class="botoesMenu" type="submit" name="Submit" value="Alterar" />
				<br /><br />
				<a href="#" onClick="return voltar();"><img alt="Voltar" src="./imgs/voltar.png" /></a>
			</form>
		</fieldset>
		';

			parent::__construct("Alterar Terreno", $conteudo);
			$this->getHead()->addScript("./js/voltar.js");
		}
	
		public function __toString(){
			parent::display();
			return '';
		}
}

?>