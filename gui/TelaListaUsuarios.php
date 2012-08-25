<?php

require_once("Tela.php");

class TelaListaUsuarios extends Tela {
	public function __construct(){
		$conteudo = '
			<table>
				<tr>
					<th>Login</th>
					<th>E-Mail</th>
					<th>&nbsp;</th>
				</tr>';
			$usuarios = $_SESSION['listausuarios'];
			foreach($usuarios as $usuario){ 
				$conteudo .= '
				<tr>
					<td>'.$usuario["Login"].'</td>
					<td>'.$usuario["Email"].'</td>
					<td name="idusuario">
						<a href="../Lyngvi/index.php?acao=excluirUsuario&idusuario='.$usuario["Id"].'">
						<img alt="Excluir" src="./imgs/erro.png" /></a>
					</td>
				</tr>
';
			}
				$conteudo .='
			</table><br />
			<a href="#" onClick="return voltar();"><img alt="Voltar" src="./imgs/voltar.png" /></a>';
	
			parent::__construct("Lista de Usuários", $conteudo);
				$this->getHead()->addScript("./js/voltar.js");
	}
	
	public function __toString(){
		parent::display();
		return '';
	}
}

?>