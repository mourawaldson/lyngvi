<?php

require_once("./gui/Tela.php");

class TelaAdministradorLogado extends Tela {
	public function __construct(){
		$conteudo ='
			<ol id="acoes">
				<li id="bemvindo">Bem Vindo, <i>'.$_SESSION['administrador']->getLogin().'</i></li> 
				<li><a href="../Lyngvi/index.php?acao=TelaAlteraAdministrador"><img alt="Alterar" src="./imgs/alterar.png" /></a></li>
				<li><a href="../Lyngvi/index.php?acao=deslogarAdministrador"><img alt="Deslogar" src="./imgs/logout.png" /></a></li>
			</ol>
			<fieldset id="cadlistAdministrador">
				<legend id="legenda">Cadastros&nbsp;</legend><br />
					<a href="./index.php?acao=TelaCadastroNoticia">
						<img id="listar" alt="Cadastrar Notícia" src="./imgs/cadastro.png" />Cadastrar Notícia</a>
					<br /><br /><br /><br /><br /><br />
					<a href="./index.php?acao=TelaCadastroTerreno">
						<img id="listar" alt="Cadastrar Terreno" src="./imgs/cadastro.png" />Cadastrar Terreno
					</a>
			</fieldset>
			<fieldset id="cadlistAdministrador">
				<legend id="legenda">Listagens&nbsp;</legend><br />
					<a href="./index.php?acao=listarCartas">
						<img id="listar" alt="Listar Cartas" src="./imgs/listar.png" />Listar Cartas
					</a><br /><br /><br />
					<a href="./index.php?acao=listarTerrenos">
						<img id="listar" alt="Listar Terrenos" src="./imgs/listar.png" />Listar Terrenos
					</a><br /><br /><br />
					<a href="./index.php?acao=listarUsuarios">
						<img id="listar" alt="Listar Usuários" src="./imgs/listar.png" />Listar Usuários
					</a>
			</fieldset>
			';
	
			parent::__construct(".: Bem Vindo ".$_SESSION['administrador']->getLogin()." :.", $conteudo);
		}
	
		public function __toString(){
			parent::display();
			return '';
		}
}

?>