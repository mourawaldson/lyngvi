<?php

require_once("Tela.php");

class TelaCadastroNoticia extends Tela {
	public function __construct(){
		$conteudo ='
		<fieldset id="cadastro">
			<form name="frm" method="post" action="index.php?acao=cadastrarNoticia">
				<legend id="legenda">Cadastro de Notícias&nbsp;</legend><br />
				<label>Título: </label>
				<input class="campos" id="tituloNoticia" type="text" name="titulo" /><br /><br />
				<label>Notícia: </label><br />
				<textarea id="conteudo" name="texto" cols="40" rows="7"></textarea><br /><br />
				<input id="botoesFormulario" class="botoesMenu" type="submit" name="Submit" value="Cadastrar" />
				<br /><br />
				<a href="#" onClick="return voltar();"><img alt="Voltar" src="./imgs/voltar.png" /></a>
			</form>
		</fieldset>
		';

			parent::__construct("Cadastrar Notícia", $conteudo);
			$this->getHead()->addScript("./js/voltar.js");
		}
	
		public function __toString(){
			parent::display();
			return '';
		}
}

?>