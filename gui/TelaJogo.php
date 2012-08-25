<?php

require_once("Tela.php");

class TelaJogo extends Tela {
	public function __construct(){
		$conteudo ='
			<div id="ojogo">
				<p>Há muito tempo atrás, em um mundo chamado Lyngvi onde deuses dominam absolutos em um reinado vitalício, uma grande batalha por poder ameaçava surgir. A deusa Féctra, rainha do submundo negava-se em dividir a terra de Lyngvi com seu irmão Cadmo, rei dos paraísos celestes de Lyngvi. Féctra nunca aceitou essa divisão, ao contrario do seu irmão que preferia ver o reino divido em duas partes distintas, a ter que se submeter aos desejos de sua irmã. A Féctra coube dois mundos, DammedLand (mundo da maldição) e FeuerLand(mundo das criaturas vulcânicas), já para Cadmo ficou reservado o direito de reinar sobre HolyLand(mundo dos espíritos) e WasserLand(mundo das criaturas submarinas).</p>
				<p>E assim muito tempo se passou e parecia que essa batalha não teria mais fim, mas uma antiga profecia, feita pelo primeiro e único homem a passar por aquela terra, estava prestes a se cumprir. A profecia dizia que quando o fim de uma grande guerra estivesse prestes a estourar, uma nova raça de criaturas iria surgir e quem tivesse ao seu lado os seres mais fortes dessa raça, sagraria-se o grande senhor das terras de Lyngvi. Essa nova raça são os humanos que por meio de portais no planeta terra, conseguiram chegar até as terras de Lyngvi, alguns deles ficaram do lado da rainha Féctra e outros do rei Cadmo, cada vez mais humanos vem entrando em Lyngvi e os reis dando monstros para servi-los nessa batalha épica, pois só com o poder dos humanos a vitória será definitivamente conquistada.</p>
			</div>
			<br /><br />
			<a href="#" onClick="return voltar();"><img alt="Voltar" src="./imgs/voltar.png" /></a>';

			parent::__construct("O Jogo", $conteudo);
				$this->getHead()->addEstilo("./css/oJogo.css");
				$this->getHead()->addScript("./js/voltar.js");
		}

		public function __toString(){
			parent::display();
			return '';
		}
}

?>