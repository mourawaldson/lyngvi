<?php

require_once("Tela.php");

class TelaEspera extends Tela {
	public function __construct(){
		
		$conteudo .='
		<script language="javascript">
			function verificaCartasEscolhidas()
				{
					window.location.assign("index.php?acao=verificaCartasEscolhidas");
				}
			var t = setInterval("verificaCartasEscolhidas()",2500);
		</script>
		';
			
		$conteudo .= '
				<br /><br /><br /><br /><br /><br />
				<img src="./imgs/ajax-loader.gif" /> carregando...<br /><br />
		';

		parent::__construct("Batalhando...", $conteudo);
		}
	
		public function __toString(){
			parent::display();
			return '';
		}
}

?>
