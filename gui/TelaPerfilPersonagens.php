<?php

require_once("Tela.php");

class TelaPerfilPersonagens extends Tela {
	public function __construct(){
		$conteudo ='
				<table id="perfilPersonagens">
					<tr>
						<td class="paddingright">
							<a href="javascript:void(0);" onmouseover="return overlib(\'Moku diz: Clique e descubra minha história\');" onclick="return overlib(\'A rainha Féctra observando o mundo humano viu o quanto as árvores eram desprezadas e deu a chance delas revidarem assim nasceram os Moku: Árvores mortas que representam a podridão do mundo, os Moku não apresentam sentimentos mas adoram atrapalhar a vida de quem se atreve a passar pela Dammedland.\', STICKY, CAPTION, \'História de Moku\');" onmouseout="return nd();">*Moku*</a>
							<div id="carta">
								<img alt="Moku" src="./imgs/Cartas/Moku.png" />
							</div>
						</td>
						
						<td class="paddingright">
							<a href="javascript:void(0);" onmouseover="return overlib(\'Ent diz: Clique e descubra minha história\');" onclick="return overlib(\'Quando Moku-Rei viu suas fileiras caindo perante o poder do Rei Cadmo, ficou com tanta ira que invocou a rainha Féctra reclamando da fraqueza dos Moku, Féctra, ao ver o 1º Moku expressar um sentimento a IRA transmutou o Moku de tal forma que pudesse expressar sua ira nas outras criaturas de Lyngvi. E assim nasce os Ent da Ira de um Moku.\', STICKY, CAPTION, \'História de Ent\');" onmouseout="return nd();">*Ent*</a>
							<div id="carta">
								<img alt="Ent" src="./imgs/Cartas/Ent.png" />
							</div>
						</td>
				
						<td class="paddingright">
							<a href="javascript:void(0);" onmouseover="return overlib(\'Yggdrasil diz: Clique e descubra minha história\');" onclick="return overlib(\'O feitiço emanado pela rainha Féctra ao Moku-Rei continuou surtindo efeito por longos anos, quando um Ent abdica totalmente o pouco raciocinio que lhe foi dado deixando em seu lugar apenas o Ódio ele transmuta em um Yggdrasil:grandes ferozes capazes de destruir tudo no seu caminho, sem espaço para dor, sem espaço para cansaço.\', STICKY, CAPTION, \'História de Yggdrasil\');" onmouseout="return nd();">*Yggdrasil*</a>
							<div id="carta">
								<img alt="Yggdrasil" src="./imgs/Cartas/Yggdrasil.png" />
							</div>
						</td>
				
						<td class="paddingright">
							<a href="javascript:void(0);" onmouseover="return overlib(\'Agassu diz: Clique e descubra minha história\');" onclick="return overlib(\'Féctra em uma de suas brincadeiras sádicas costurou um boneco feito de seda do abismo e pôs vermes da Dammedland nele presenteando Cadmo com o boneco, Cadmo devolveu o boneco desta vez animado Agassu como Féctra o chamou, é perverso, mal-cheiroso os vermes dentro dele se contorcem e lhe dão força, Féctra adorou a idéia e fez de Agassu uma de suas criaturas.\', STICKY, CAPTION, \'História de Agassu\');" onmouseout="return nd();">*Agassu*</a>
							<div id="carta">
								<img alt="Agassu" src="./imgs/Cartas/Agassu.png" />
							</div>
						</td>
						
						<td>
							<a href="javascript:void(0);" onmouseover="return overlib(\'Euthanatos diz: Clique e descubra minha história\');" onclick="return overlib(\'Ninguém consegue ficar preso por muito tempo...Os vermes de dentro do Agassu se multiplicam mais e mais, inchando o Agassu a ponto de estourar saindo pela sua boca e por parte de seu corpo neste ponto os vermes são como uma criatura, juntas elas tem um poder destrutivo de toxinas.\', STICKY, CAPTION, \'História de Euthanatos\');" onmouseout="return nd();">*Euthanatos*</a>
							<div id="carta">
								<img alt="Euthanatos" src="./imgs/Cartas/Euthanatos.png" />
							</div>
						</td>
					</tr>
					
					<tr>
						<td class="paddingright">
							<a href="javascript:void(0);" onmouseover="return overlib(\'Samedi diz: Clique e descubra minha história\');" onclick="return overlib(\'Os vermes crescidos do Euthanatos consomem toda a seda do abismo ganhando mais forças produzindo um esqueleto perfeito de tamanho sobre-humano, sagazes, velozes, sons irritantes e muitas toxinas assim os Samedi destroem tudo que lhes é inútil... os samedi conseguem se comunicar com outros vermes da Dammedland.\', STICKY, CAPTION, \'História de Samedi\');" onmouseout="return nd();">*Samedi*</a>
							<div id="carta">
								<img alt="Samedi" src="./imgs/Cartas/Samedi.png" />
							</div>
						</td>
					</tr>
				</table>

			<a href="#" onClick="return voltar();"><img alt="Voltar" src="./imgs/voltar.png" /></a>
			';

			parent::__construct("Perfil dos Personagens", $conteudo);
				$this->getHead()->addEstilo("./css/perfilPersonagens.css");
				$this->getHead()->addScript("./js/voltar.js");
				$this->getHead()->addScript("./js/overlib.js");
		}

		public function __toString(){
			parent::display();
			return '';
		}
}

?>