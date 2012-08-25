<?php

require_once("Tela.php");

class TelaBaralho extends Tela {
	public function __construct(){
	
		$conteudo = ' 
				<form>
					<table id="jogadores">
						<tr>
							<th>&nbsp;</th>
							<th>Nome</th>
							<th>Nível</th>
							<th>Level</th>
							<th>Experiencia</th>
							<th>HP</th>
							<th>Ataque</th>
							<th>Defesa</th>
							<th>Terreno</th>
						</tr>
					';

		$baralho = $_SESSION['jogadorlogado']->getBaralho();

		foreach($baralho as $cartas){ 
		$conteudo .= '
						<tr>
							<td><img src="'.$cartas["url_imagem"].'"/></td>
							<td>'.$cartas["nome"].'</td>
							<td>'.$cartas["nivel"].'</td>
							<td>'.$cartas["level"].'</td>
							<td>'.$cartas["experiencia"].'</td>
							<td>'.$cartas["hp"].'</td>
							<td>'.$cartas["ataque"].'</td>
							<td>'.$cartas["defesa"].'</td>
							<td>'.$cartas["terreno"].'</td>
						</tr>
					';
			};
		$conteudo .='
					</table>
				</form>
				<br /><br />
				<a href="#" onClick="return voltar();"><img alt="Voltar" src="./imgs/voltar.png" /></a>';

		parent::__construct("Cartas de ".$_SESSION['jogadorlogado']->getNome(), $conteudo);
			$this->getHead()->addScript("./js/voltar.js");
		}
	
		public function __toString(){
			parent::display();
			return '';
		}
}

?>