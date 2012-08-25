<?php

require_once("Tela.php");

class TelaLogBatalha extends Tela {
	public function __construct(){
	
		$vencedores = $_SESSION['log']['vencedores'];
		$perdedores = $_SESSION['log']['perdedores'];
		$evoluidas = $_SESSION['log']['evoluidos'];
		$situacao = $_SESSION['log']['situacao'];

		$conteudo .= '
			<h5>Cartas Vencedoras</h5>
			<table>
				<tr>
					<th>Id Baralho</th>
					<th>Carta</th>
					<th>Level</th>
					<th>Experiencia</th>
					<th>HP</th>
					<th>Ataque</th>
					<th>Defesa</th>
				</tr>';

		foreach($vencedores as $vencedor){
			$conteudo .= '
				<tr>
					<td>'.$vencedor->getId().'</td>					
					<td>'.$vencedor->getCarta().'</td>
					<td>'.$vencedor->getLevel().'</td>
					<td>'.$vencedor->getExperiencia().'</td>
					<td>'.$vencedor->getHP().'</td>
					<td>'.$vencedor->getAtaque().'</td>
					<td>'.$vencedor->getDefesa().'</td>						
				</tr>
			';
		}

		$conteudo .='
			</table><br /><br />
			';

		$conteudo .= '
			<h5>Cartas Evoluidas</h5>
			<table>
				<tr>
					<th>Id Baralho</th>
					<th>Carta</th>
					<th>Level</th>
					<th>Experiencia</th>
					<th>HP</th>
					<th>Ataque</th>
					<th>Defesa</th>
				</tr>';

		foreach($evoluidas as $evoluida){
			$conteudo .= '
				<tr>
					<td>'.$evoluida->getId().'</td>					
					<td>'.$evoluida->getCarta().'</td>
					<td>'.$evoluida->getLevel().'</td>
					<td>'.$evoluida->getExperiencia().'</td>
					<td>'.$evoluida->getHP().'</td>
					<td>'.$evoluida->getAtaque().'</td>
					<td>'.$evoluida->getDefesa().'</td>						
				</tr>
			';
		}
		
		$conteudo .='
			</table><br /><br />
			';
		
		$conteudo .= '
			<h5>Cartas Perdedoras</h5>
			<table>
				<tr>
					<th>Id Baralho</th>
					<th>Carta</th>
					<th>Level</th>
					<th>Experiencia</th>
					<th>HP</th>
					<th>Ataque</th>
					<th>Defesa</th>
				</tr>';

		foreach($perdedores as $perdedor){
			$conteudo .= '
				<tr>
					<td>'.$perdedor->getId().'</td>					
					<td>'.$perdedor->getCarta().'</td>
					<td>'.$perdedor->getLevel().'</td>
					<td>'.$perdedor->getExperiencia().'</td>
					<td>'.$perdedor->getHP().'</td>
					<td>'.$perdedor->getAtaque().'</td>
					<td>'.$perdedor->getDefesa().'</td>						
				</tr>
			';
		}
		
		$conteudo .='
			</table><br /><br />
			<h5 id="situacao">Situa��o Final</h5>
			';
			if ($situacao == "Ganhou"){
				$conteudo .='PARAB�NS voc� '.$situacao.' =D';
			}else{
				$conteudo .='Que pena voc� '.$situacao.' =/';
			}
			
			$conteudo .='
			<br /><br />
			<a href="index.php?acao=exibeTelaJogadorLogado"><img alt="Avan�ar" src="./imgs/avancar.png" /></a>';

			parent::__construct("Resultado da batalha", $conteudo);
			$this->getHead()->addEstilo("./css/logBatalha.css");
		}

		public function __toString(){
			parent::display();
			return '';
		}
}

?>