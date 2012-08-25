<?php

$acao = '';

if ( isset($_REQUEST['acao']) ){
	$acao = $_REQUEST['acao'];
}

require("util/Fachada.php");

$fachada = new Fachada($acao);

echo $fachada->getTela();

?>