<?php
require_once __DIR__ . '/Producao.php';

class Filme extends Producao {
    public $duracao;

    public function __construct($id, $titulo, $genero, $diretor, $classificacao, $duracao, $data_lancamento, $cartaz = null, $cartaz_tipo = null) {
        parent::__construct($id, $titulo, $genero, $diretor, $classificacao, $data_lancamento, $cartaz, $cartaz_tipo);
        $this->duracao = $duracao;
    }
}