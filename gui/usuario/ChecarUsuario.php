<?php

session_start();
if ( !isset ($_SESSION['usuario'] ) ) {
	header("location: index.php?acao=TelaErro&msg=Usuário não logado no sistema.");
	exit;
}

?>