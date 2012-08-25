<?php

require_once("Cabecalho.php");
require_once("Corpo.php");

abstract class Tela {
	private $head;
	private $body;
	private static $estrutura;
	
	public function __construct($titulo, $conteudo){
		$this->estrutura = '
	<center>
	<div id="centro">

		<h1></h1>	
	
		<ol id="menu">
			<li>
				<form method="post" action="index.php">
					<input class="botoesMenu" type="submit" value="Home" />
				</form>
			</li>
			<li class="linha"></li>
			<li>
				<form method="post" action="index.php?acao=TelaJogo">
					<input class="botoesMenu" type="submit" value="O Jogo" />
				</form>
			</li>			
			<li class="linha"></li>			
			<li>
				<form method="post" action="index.php?acao=TelaPerfilPersonagens">
					<input class="botoesMenu" id="perfilPersonagens" type="submit" value="Perfil dos Personagens" />
				</form>
			</li>			
			<li class="linha"></li>			
			<li>
				<form method="post" action="index.php?acao=TelaNoticias">
					<input class="botoesMenu" type="submit" value="Notícias" />
				</form>
			</li>
			<li class="linha"></li>			
			<li>
				<form method="post" action="index.php?acao=TelaFaleConosco">
					<input class="botoesMenu" type="submit" value="Fale Conosco" />
				</form>
			</li>
		</ol>
';

		$this->estrutura .= '
		<div id="conteudo">
			<!--#CONTEUDO#-->
		</div>
		
		<div id="barraFinal">
			Todos os direitos reservados &copy;<br>
			Acesso dos administradores: <a id="logarAdm" href="index.php?acao=TelaLogarAdministrador">Logar.</a><br>
			Melhor visualizado na resolução 1024 x 768.
		</div>
		
	</div>
	</center>
';

		$this->setHead( new Cabecalho( $titulo ) );
		$this->getHead()->addEstilo("./css/principal.css");
		$this->setBody( new Corpo($this->estrutura, $conteudo) );
	}

	private function setHead( $valor ) {
		$this->head = $valor;
	}

	protected function getHead() {
		return $this->head;
	}

	private function setBody( $valor ) {
		$this->body = $valor;
	}

	private function getBody() {
		return $this->body;
	}

	public function display() {
		echo "<html>\n";
		echo $this->getHead();
		echo "\n";
		echo $this->getBody();
		echo "\n</html>";
	}

}

?>