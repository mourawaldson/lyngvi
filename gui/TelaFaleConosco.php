<?php

require_once("Tela.php");

class TelaFaleConosco extends Tela {
	public function __construct(){
		$conteudo ='
			<fieldset id="cadastro">

				<form name="frmFaleConosco" method="post" action="index.php?acao=enviarEmail">
					<legend id="legenda">Fale Conosco&nbsp;</legend><br />
					<label>Nome:</label>
					<input class="campos" id="fcnome" name="nome" type="text" value="Digite aqui o seu nome" /><br /><br />
					<label>E-Mail: </label>
					<input class="campos" id="fcemail" name="email" type="text" value="Digite seu e-mail" /><br /><br />
					<label>Assunto:</label>
					<select id="assunto" name="assunto">
						<option>D&uacute;vida</option>
						<option>Sugest&atilde;o</option>
						<option>Reclama&ccedil;&atilde;o</option>
					</select><br /><br />
					<label>Anota&ccedil;&otilde;es:</label><br />
					<textarea id="conteudo" name="conteudo" cols="40" rows="7">Digite aqui o seu comentário</textarea><br /><br />
					<input id="botoesFormulario" class="botoesMenu" type="submit" name="Submit" value="Enviar" >
					<input id="botoesFormulario" class="botoesMenu" type="reset" name="Reset" value="Limpar" onClick="return focus();" />
				</form>

			</fieldset>
			<br /><br />
			<a href="#" onClick="return voltar();"><img alt="Voltar" src="./imgs/voltar.png" /></a>
			';

			parent::__construct("Fale Conosco", $conteudo);
				$this->getHead()->addScript("./js/voltar.js");
		}

		public function __toString(){
			parent::display();
			return '';
		}
}

?>