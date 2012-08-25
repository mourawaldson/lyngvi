<?php

require_once("Tela.php");

class TelaConvites extends Tela {
	public function __construct(){
	if ($_SESSION['convites'] <> NULL){
		$conteudo = '
				<form method="post" action="index.php?acao=aceitarConvite">
					<table>
						<tr>
							<th>&nbsp</th>
							<th>&nbsp</th>
							<th>Nome</th>
							<th>Vitórias</th>
							<th>Partidas</th>
							<th>Data Hora</th>
							<th>&nbsp;</th>
						</tr>
					';

			session_start();
			$jogadores = $_SESSION['convites'];

			foreach($jogadores as $jogador){ 
				$conteudo .= '
						<tr>
							<td><img src="'.$jogador["Url_Imagem"].'"/></td>
							<td><input type="radio" name="RadioGroupJogador" value="'.$jogador["Id"].'" checked /></td>
							<td>'.$jogador["Nome"].'</td>
							<td>'.$jogador["Qtd_Partidas"].'</td>
							<td>'.$jogador["Qtd_Vitorias"].'</td>
							<td>'.$jogador["DataHora"].'</td>
							<td>
								<a href="../Lyngvi/index.php?acao=cancelarConvite&RadioGroupJogador='.$jogador["Id"].'">
								<img alt="Cancelar Convite" src="./imgs/erro.png" /></a>
							</td>
						</tr>
						';
			}

			$conteudo .='
				</table><br />
				<input class="botoesMenu" id="botoesFormulario" type="submit" value="Aceitar Convite" />
			</form><br />';
	}else{
		header("Location: index.php?acao=verConvites");
	}
			$conteudo .='
				<a href="#" onClick="return voltar();"><img alt="Voltar" src="./imgs/voltar.png" /></a>';

			parent::__construct("Convites", $conteudo);
				$this->getHead()->addScript("./js/voltar.js");
	}

	public function __toString(){
		parent::display();
		return '';
	}
}

?>