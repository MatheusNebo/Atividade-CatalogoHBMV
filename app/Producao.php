<?php
// Classe base para evitar repetição (DRY - Don't Repeat Yourself)
class Producao {
    public $id;
    public $titulo;
    public $genero;
    public $diretor;
    public $classificacao;
    public int $data_lancamento;
    public $cartaz;
    public $cartaz_tipo;

    public function __construct($id, $titulo, $genero, $diretor, $classificacao, $data_lancamento, $cartaz = null, $cartaz_tipo = null) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->genero = $genero;
        $this->diretor = $diretor;
        $this->classificacao = $classificacao;
        $this->data_lancamento = $data_lancamento;
        $this->cartaz = $cartaz;
        $this->cartaz_tipo = $cartaz_tipo;
    }
}
