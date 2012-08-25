<?php

require_once("Tela.php");

class TelaNoticias extends Tela {
	public function __construct(){
		$conteudo ='<h3 align="center">Últimas Notícias </h3>
';
		$noticias = $_SESSION['noticia'];

		foreach($noticias as $noticia){
			$datahora = $noticia["DataHora"];
			$dataf = substr($datahora,8,2).'/'.substr($datahora,5,2).'/'.substr($datahora,0,4).' '.substr($datahora,11,5);

			$conteudo .='
			<table id="noticias">

				<tr>
					<td name="idnoticia">
						<a id="titulo" href="../Lyngvi/index.php?acao=mostrarNoticia&idnoticia='.$noticia["Id"].'">'.$noticia["Titulo"].'</a>
					</td>
				</tr>

				<tr>
					<td>'.$dataf.'<br />'.substr($noticia["Texto"],0,256).'... 
					<a id="leiamais" href="../Lyngvi/index.php?acao=mostrarNoticia&idnoticia='.$noticia["Id"].'">Leia mais</a></td>
				</tr>

			</table>

			<br />
';
		};

		$conteudo .='
			<div id="noticiaExibida">
			</div>
			<a href="#" onClick="return voltar();"><img alt="Voltar" src="./imgs/voltar.png" /></a>
			';

		parent::__construct("Notícias", $conteudo);
			$this->getHead()->addScript("./js/voltar.js");
			$this->getHead()->addEstilo("./css/noticias.css");
	}

	public function __toString(){
		parent::display();
		return '';
	}
}

?>