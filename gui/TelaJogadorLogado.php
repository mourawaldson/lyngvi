<?php

require_once("Tela.php");

class TelaJogadorLogado extends Tela {
	public function __construct(){

		$conteudo .='
			<script language="javascript">
				function verificaConviteAceito()
					{
						window.location.assign("index.php?acao=verificaConviteAceito");
					}
				var t = setInterval("verificaConviteAceito()",2500);
			</script>
			';

		$conteudo .='
			<a href="../Lyngvi/index.php?acao=TelaBaralho">Visualizar Baralho</a>
			<a href="../Lyngvi/index.php?acao=deslogarJogador"><img id="deslogar" alt="Deslogar" src="./imgs/logout.png" /></a><br /><br />
			';

		if($_SESSION['jogadoreslogados'] <> NULL){				
			$conteudo .='		
					<form method="post" action="index.php?acao=convidarJogador">	
						<table>
							<tr>
								<th>&nbsp</th>
								<th>Nome</th>
								<th>Vitorias</th>
								<th>Partidas</th>
								<th>&nbsp</th>
							</tr>
						';

			$jogadoreslogados = $_SESSION['jogadoreslogados'];

			foreach($jogadoreslogados as $jogadorlogado){ 
			$conteudo .= '
							<tr>
								<td><input type="radio" name="RadioGroupJogador" value="'.$jogadorlogado["Id"].'" checked /></td>
								<td>'.$jogadorlogado["Nome"].'</td>
								<td>'.$jogadorlogado["Qtd_Vitorias"].'</td>
								<td>'.$jogadorlogado["Qtd_Partidas"].'</td>
								<td><img src="'.$jogadorlogado["Url_Imagem"].'"/></td>
							</tr>';
				};
			$conteudo .='
						</table><br />
						<input class="botoesMenu" id="convite" type="submit" value="Convidar Jogador" /><br /><br />
					</form>
					
					<form method="post" action="index.php?acao=verConvites">
						<input class="botoesMenu" id="convite" type="submit" value="Ver Convites" /><br />
					</form>';
		}else{
			$conteudo .='<i>Não há jogadores logados no momento!!</i><br />';
		}

		parent::__construct(".: Bem Vindo ".$_SESSION['jogadorlogado']->getNome()." :.", $conteudo);
		}
	
		public function __toString(){
			parent::display();
			return '';
		}
}

?>