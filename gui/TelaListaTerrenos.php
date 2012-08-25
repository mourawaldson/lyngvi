<?php

require_once("Tela.php");

class TelaListaTerrenos extends Tela {
	public function __construct(){
		$conteudo = '
			<table>
				<tr>
					<th>Nome do Terreno</th>
				</tr>';

			$terrenos = $_SESSION['listaterrenos'];

			foreach($terrenos as $terreno){

		$conteudo .= '
				<tr>
					<td>'.$terreno["Nome"].'</td>
					<td name="idterreno">
						<a href="../Lyngvi/index.php?acao=TelaAlteraTerreno&idterreno='.$terreno['Id'].'">
						<img alt="Alterar" src="./imgs/alterar.png" /></a>
					</td>
					<td name"idterreno">
						<a href="../Lyngvi/index.php?acao=excluirTerreno&idterreno='.$terreno["Id"].'">
						<img alt="Excluir" src="./imgs/erro.png" /></a>
					</td>
				</tr>
';
			}
		$conteudo .='
			</table><br />
			<a href="#" onClick="return voltar();"><img alt="Voltar" src="./imgs/voltar.png" /></a>';
	
			parent::__construct("Lista de Terrenos", $conteudo);
				$this->getHead()->addScript("./js/voltar.js");
	}
	
	public function __toString(){
		parent::display();
		return '';
	}
}

?>