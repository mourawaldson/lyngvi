<?php

require_once("Tela.php");

class TelaPerfilPersonagens extends Tela {
	public function __construct(){
		$conteudo ='
				<table id="perfilPersonagens">
					<tr>
						<td class="paddingright">
							<a href="javascript:void(0);" onmouseover="return overlib(\'Moku diz: Clique e descubra minha hist�ria\');" onclick="return overlib(\'A rainha F�ctra observando o mundo humano viu o quanto as �rvores eram desprezadas e deu a chance delas revidarem assim nasceram os Moku: �rvores mortas que representam a podrid�o do mundo, os Moku n�o apresentam sentimentos mas adoram atrapalhar a vida de quem se atreve a passar pela Dammedland.\', STICKY, CAPTION, \'Hist�ria de Moku\');" onmouseout="return nd();">*Moku*</a>
							<div id="carta">
								<img alt="Moku" src="./imgs/Cartas/Moku.png" />
							</div>
						</td>
						
						<td class="paddingright">
							<a href="javascript:void(0);" onmouseover="return overlib(\'Ent diz: Clique e descubra minha hist�ria\');" onclick="return overlib(\'Quando Moku-Rei viu suas fileiras caindo perante o poder do Rei Cadmo, ficou com tanta ira que invocou a rainha F�ctra reclamando da fraqueza dos Moku, F�ctra, ao ver o 1� Moku expressar um sentimento a IRA transmutou o Moku de tal forma que pudesse expressar sua ira nas outras criaturas de Lyngvi. E assim nasce os Ent da Ira de um Moku.\', STICKY, CAPTION, \'Hist�ria de Ent\');" onmouseout="return nd();">*Ent*</a>
							<div id="carta">
								<img alt="Ent" src="./imgs/Cartas/Ent.png" />
							</div>
						</td>
				
						<td class="paddingright">
							<a href="javascript:void(0);" onmouseover="return overlib(\'Yggdrasil diz: Clique e descubra minha hist�ria\');" onclick="return overlib(\'O feiti�o emanado pela rainha F�ctra ao Moku-Rei continuou surtindo efeito por longos anos, quando um Ent abdica totalmente o pouco raciocinio que lhe foi dado deixando em seu lugar apenas o �dio ele transmuta em um Yggdrasil:grandes ferozes capazes de destruir tudo no seu caminho, sem espa�o para dor, sem espa�o para cansa�o.\', STICKY, CAPTION, \'Hist�ria de Yggdrasil\');" onmouseout="return nd();">*Yggdrasil*</a>
							<div id="carta">
								<img alt="Yggdrasil" src="./imgs/Cartas/Yggdrasil.png" />
							</div>
						</td>
				
						<td class="paddingright">
							<a href="javascript:void(0);" onmouseover="return overlib(\'Agassu diz: Clique e descubra minha hist�ria\');" onclick="return overlib(\'F�ctra em uma de suas brincadeiras s�dicas costurou um boneco feito de seda do abismo e p�s vermes da Dammedland nele presenteando Cadmo com o boneco, Cadmo devolveu o boneco desta vez animado Agassu como F�ctra o chamou, � perverso, mal-cheiroso os vermes dentro dele se contorcem e lhe d�o for�a, F�ctra adorou a id�ia e fez de Agassu uma de suas criaturas.\', STICKY, CAPTION, \'Hist�ria de Agassu\');" onmouseout="return nd();">*Agassu*</a>
							<div id="carta">
								<img alt="Agassu" src="./imgs/Cartas/Agassu.png" />
							</div>
						</td>
						
						<td>
							<a href="javascript:void(0);" onmouseover="return overlib(\'Euthanatos diz: Clique e descubra minha hist�ria\');" onclick="return overlib(\'Ningu�m consegue ficar preso por muito tempo...Os vermes de dentro do Agassu se multiplicam mais e mais, inchando o Agassu a ponto de estourar saindo pela sua boca e por parte de seu corpo neste ponto os vermes s�o como uma criatura, juntas elas tem um poder destrutivo de toxinas.\', STICKY, CAPTION, \'Hist�ria de Euthanatos\');" onmouseout="return nd();">*Euthanatos*</a>
							<div id="carta">
								<img alt="Euthanatos" src="./imgs/Cartas/Euthanatos.png" />
							</div>
						</td>
					</tr>
					
					<tr>
						<td class="paddingright">
							<a href="javascript:void(0);" onmouseover="return overlib(\'Samedi diz: Clique e descubra minha hist�ria\');" onclick="return overlib(\'Os vermes crescidos do Euthanatos consomem toda a seda do abismo ganhando mais for�as produzindo um esqueleto perfeito de tamanho sobre-humano, sagazes, velozes, sons irritantes e muitas toxinas assim os Samedi destroem tudo que lhes � in�til... os samedi conseguem se comunicar com outros vermes da Dammedland.\', STICKY, CAPTION, \'Hist�ria de Samedi\');" onmouseout="return nd();">*Samedi*</a>
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