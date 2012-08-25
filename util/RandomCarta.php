<?php

	class RandomCarta{
		public static function cadmo(){
			return mt_rand(6,10);
		}
		
		public static function fectra(){
			return mt_rand(1,5);
		}
		public static function terreno(){
			return mt_rand(1,5);
		}
	}

?>
