<?php

session_start();
if ( !isset ($_SESSION['administrador'] ) ) {
	header("location: index.php?acao=TelaErro&msg=Administrador n�o logado no sistema.");
	exit;
}

?>