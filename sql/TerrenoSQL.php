<?php

	class TerrenoSQL{
	
		static public function sqlInserir($nome){
			return "INSERT INTO Terrenos (Nome) VALUES ( '".$nome."')";
		}

		static public function sqlAlterar($id,$nome){
			return "UPDATE Terrenos SET Nome = '".$nome."' where Id = ".$id;
		}

		static public function sqlExcluir($id){
			return "DELETE FROM Terrenos WHERE Id = ".$id;
		}

		static public function sqlListar(){
			return "SELECT * FROM Terrenos";
		}
		
		static public function sqlNome($nome){
			return "SELECT * FROM Terrenos WHERE Nome = '".$nome."'";
		}
		
		static public function sqlId($id){
			return "SELECT * FROM Terrenos WHERE Id = ".$id;
		}

	}

?>