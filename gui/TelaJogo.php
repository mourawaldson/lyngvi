<?php

require_once("Tela.php");

class TelaJogo extends Tela {
	public function __construct(){
		$conteudo ='
			<div id="ojogo">
				<p>H� muito tempo atr�s, em um mundo chamado Lyngvi onde deuses dominam absolutos em um reinado vital�cio, uma grande batalha por poder amea�ava surgir. A deusa F�ctra, rainha do submundo negava-se em dividir a terra de Lyngvi com seu irm�o Cadmo, rei dos para�sos celestes de Lyngvi. F�ctra nunca aceitou essa divis�o, ao contrario do seu irm�o que preferia ver o reino divido em duas partes distintas, a ter que se submeter aos desejos de sua irm�. A F�ctra coube dois mundos, DammedLand (mundo da maldi��o) e FeuerLand(mundo das criaturas vulc�nicas), j� para Cadmo ficou reservado o direito de reinar sobre HolyLand(mundo dos esp�ritos) e WasserLand(mundo das criaturas submarinas).</p>
				<p>E assim muito tempo se passou e parecia que essa batalha n�o teria mais fim, mas uma antiga profecia, feita pelo primeiro e �nico homem a passar por aquela terra, estava prestes a se cumprir. A profecia dizia que quando o fim de uma grande guerra estivesse prestes a estourar, uma nova ra�a de criaturas iria surgir e quem tivesse ao seu lado os seres mais fortes dessa ra�a, sagraria-se o grande senhor das terras de Lyngvi. Essa nova ra�a s�o os humanos que por meio de portais no planeta terra, conseguiram chegar at� as terras de Lyngvi, alguns deles ficaram do lado da rainha F�ctra e outros do rei Cadmo, cada vez mais humanos vem entrando em Lyngvi e os reis dando monstros para servi-los nessa batalha �pica, pois s� com o poder dos humanos a vit�ria ser� definitivamente conquistada.</p>
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