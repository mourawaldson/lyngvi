<?php

class NoticiaSQL{
	
	static public function sqlInserir($titulo,$texto,$datahora){
		return "INSERT INTO Noticias (Titulo,Texto,DataHora) VALUES ( '".$titulo."','".$texto."','".$datahora."')";
	}

	static public function sqlAlterar($titulo,$textoprevio,$texto,$datahora,$id){
		return "UPDATE Noticias SET Titulo = '".$titulo."', Texto = '".$texto."', DataHora = '".$datahora."' WHERE Id = '".$id."'";
	}

	static public function sqlExcluir($id){
		return "DELETE FROM Noticias WHERE Id = ".$id;
	}
	
	static public function sqlCarregarId($id){
		return "SELECT * FROM Noticias WHERE Id = ".$id;
	}
	
	static public function sqlListar(){
		return "SELECT * FROM Noticias ORDER BY `DataHora` DESC";
	}

}

?>