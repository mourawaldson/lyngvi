<?php

	class Jogador{
		private $id;
		private $nome;
		private $partidas;
		private $vitorias;
		private $dinheiro;
		private $imagem;
		private $baralho;

		function __construct($id,$nome=null,$imagem=null){
			$this->id = $id;
			$this->nome = $nome;
			$this->imagem = $imagem;
		}
		
		function getId(){
			return $this->id;
		}

		function getNome(){
			return $this->nome;
		}

		function getPartidas(){
			return $this->partidas;
		}

		function getVitorias(){
			return $this->vitorias;
		}

		function getDinheiro(){
			return $this->dinheiro;
		}

		function getImagem(){
			return $this->imagem;
		}

		function getBaralho(){
			return $this->baralho;
		}

		function setId($id){
			$this->id = $id;
		}

		function setNome($nome){
			$this->nome = $nome;
		}

		function setPartidas($partidas){
			$this->partidas = $partidas;
		}

		function setVitorias($vitorias){
			$this->vitorias = $vitorias;
		}

		function setDinheiro($dinheiro){
			$this->dinheiro = $dinheiro;
		}

		function setImagem($imagem){
			$this->imagem = $imagem;
		}

		function addCarta($carta){
			$this->baralho = $carta;
		}

	}

?>