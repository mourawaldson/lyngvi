<?php

session_start();
if ( !isset ($_SESSION['usuario'] ) ) {
	header("location: index.php?acao=TelaErro&msg=Usu�rio n�o logado no sistema.");
	exit;
}

?>