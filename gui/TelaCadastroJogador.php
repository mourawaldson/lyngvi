<?php

require_once("Tela.php");

class TelaCadastroJogador extends Tela {
	public function __construct(){
		$conteudo ='
			<fieldset id="cadastro">
				<form id="formCadastro" name="formCadastro" method="post" action="index.php?acao=cadastrarJogador">
					<legend id="legenda">Cadastro Jogador&nbsp;</legend><br />
					<label>Nome: </label>
					<input id="edJogador" class="campos" type="text" name="nome" /><br /><br />
					<table id="avatares">
						<tr>
							<td><input class="radioAvatar" checked type="radio" name="avatar" value="imgs/Avatares/Avatar1.png" /><img src="imgs/Avatares/Avatar1.png" /></td>
							<td><input class="radioAvatar" type="radio" name="avatar" value="imgs/Avatares/Avatar2.png" /><img src="imgs/Avatares/Avatar2.png" /></td>
							<td><input class="radioAvatar" type="radio" name="avatar" value="imgs/Avatares/Avatar3.png" /><img src="imgs/Avatares/Avatar3.png" /></td>
							<td><input class="radioAvatar" type="radio" name="avatar" value="imgs/Avatares/Avatar4.png" /><img src="imgs/Avatares/Avatar4.png" /></td>
							<td><input class="radioAvatar" type="radio" name="avatar" value="imgs/Avatares/Avatar5.png" /><img src="imgs/Avatares/Avatar5.png" /></td>
							<td><input class="radioAvatar" type="radio" name="avatar" value="imgs/Avatares/Avatar6.png" /><img src="imgs/Avatares/Avatar6.png" /></td>
						</tr>
					</table><br />
					<input type="radio" name="deus" value="0" checked /><label>Fectra</label>
					<input type="radio" name="deus" value="1" /><label>Cadmo</label><br /><br />
					<input id="botoesFormulario" class="botoesMenu" type="submit" name="Submit" value="Cadastrar" /><br /><br />
					<a href="#" onClick="return voltar();"><img alt="Voltar" src="./imgs/voltar.png" /></a>
				</form>
			</fieldset>
			';
	
			parent::__construct("Cadastrar Jogador", $conteudo);
			$this->getHead()->addScript("./js/voltar.js");
		}
	
		public function __toString(){
			parent::display();
			return '';
		}
}

?>