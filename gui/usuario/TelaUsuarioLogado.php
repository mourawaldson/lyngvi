<?php

require_once("./gui/Tela.php");

class TelaUsuarioLogado extends Tela {
	public function __construct(){
	if ($_SESSION['usuario']->getJogadores() <> NULL){
		$conteudo = '
			<ol id="acoes">
				<li id="bemvindo">Bem Vindo, <i>'.$_SESSION['usuario']->getLogin().'</i></li> 
				<li><a href="../Lyngvi/index.php?acao=TelaAlteraUsuario"><img alt="Alterar" src="./imgs/alterar.png" /></a></li>
				<li><a href="../Lyngvi/index.php?acao=deslogarUsuario"><img alt="Deslogar" src="./imgs/logout.png" /></a></li>
			</ol>
			<form method="post" action="index.php?acao=logarJogador">
				<table id="jogadores">
					<tr>
						<th>&nbsp;</th>
						<th>&nbsp;</th>
						<th>Jogador</th>
						<th>Partidas</th>
						<th>Vitórias</th>
						<th>Dinheiro</th>
					</tr>
					';
			$jogadores = $_SESSION['usuario']->getJogadores();
			foreach($jogadores as $jogador){ 
				$conteudo .= '
					<tr>
						<td><img src="'.$jogador["Url_Imagem"].'"/></td>
						<td><input type="radio" name="RadioGroupJogador" value="'.$jogador["Id"].'" checked /></td>
						<td>'.$jogador["Nome"].'</td>
						<td>'.$jogador["Qtd_Partidas"].'</td>
						<td>'.$jogador["Qtd_Vitorias"].'</td>
						<td>'.$jogador["Dinheiro"].'</td>
					</tr>
					';
			}
				$conteudo .='
				</table><br />
				<input class="botoesMenu" id="botoesFormulario" type="submit" value="Logar Jogador" />
			</form>
			<br />
			';
	}else{
		$conteudo .='<br /><i>Você ainda não possui nenhum jogador cadastrado!</i><br /><br />';
	}
				$conteudo .='
				<a href="../Lyngvi/index.php?acao=TelaCadastroJogador">Cadastrar Novo Jogador</a><br /><br />';
	
			parent::__construct(".: Bem Vindo ".$_SESSION['usuario']->getLogin()." :.", $conteudo);
	}
	
		public function __toString(){
			parent::display();
			return '';
		}
}

?>