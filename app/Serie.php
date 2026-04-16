<?php

require_once __DIR__ . '/Producao.php';

class Serie extends Producao {
    public $temporadas;
    public $episodios;

    public function __construct($id, $titulo, $genero, $diretor, $classificacao, $temporadas, $episodios, $data_lancamento, $cartaz = null, $cartaz_tipo = null) {
        parent::__construct($id, $titulo, $genero, $diretor, $classificacao, $data_lancamento, $cartaz, $cartaz_tipo);
        $this->temporadas = $temporadas;
        $this->episodios = $episodios;
    }
}