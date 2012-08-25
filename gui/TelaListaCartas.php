<?php

require_once("Tela.php");

class TelaListaCartas extends Tela {
	public function __construct(){
		$conteudo = '
			<table>
				<tr>
					<th>&nbsp;</th>
					<th>Nome</th>
					<th>Nível</th>
				</tr>';

			$cartas = $_SESSION['listacartas'];

			foreach($cartas as $carta){

				$conteudo .= '
				<tr>
					<td><img src="'.$carta["Url_Imagem"].'" /></td>
					<td>'.$carta["Nome"].'</td>
					<td>'.$carta["Nivel"].'</td>
				</tr>
';
			}
		$conteudo .='
			</table><br />
			<a href="#" onClick="return voltar();"><img alt="Voltar" src="./imgs/voltar.png" /></a>';
	
			parent::__construct("Lista de Cartas", $conteudo);
				$this->getHead()->addScript("./js/voltar.js");
	}
	
	public function __toString(){
		parent::display();
		return '';
	}
}

?>