<?php

require_once("TelaNaoLogado.php");

class Inicial extends TelaNaoLogado{
	public function __construct(){
	if (isset($_GET['msg'])) 
		{
			$msg=$_GET['msg'];
		}
		else
		{
			$msg="";
		}
		$conteudo = '
		
			<div id="login">
				<form name="frm" method="post" action="index.php?acao=logarUsuario" class="login"> 
					<label>Usuário/E-Mail: </label>
					<input class="campos" name="login" type="text" />
					<label>Senha: </label>
					<input class="campos" name="senha" type="password" /> 
					<input class="botoesMenu" id="ok" type="submit" value="OK" />
					<br />'.$msg.'<br />
				</form>				
			</div>
			
			<div id="portais">
				<a href="index.php?acao=TelaCadastroUsuario"><img id="cadmo" src="imgs/cadmo.png" /></a>
				<a href="index.php?acao=TelaCadastroUsuario"><img id="fectra" src="imgs/fectra.png" /></a>
			</div>

		';

		parent::__construct("Lyngvi", $conteudo);
			$this->getHead()->addEstilo("./css/inicial.css");
	}
	
	public function __toString(){
		parent::display();
		return '';
	}

}

?>