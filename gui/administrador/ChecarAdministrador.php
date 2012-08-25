<?php

session_start();
if ( !isset ($_SESSION['administrador'] ) ) {
	header("location: index.php?acao=TelaErro&msg=Administrador não logado no sistema.");
	exit;
}

?>