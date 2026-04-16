<?php
require_once dirname(__DIR__) . '/database.php';

class FilmeRepository{
    private $db;

    public function __construct() {
        $this->db = Database::conectar();
    }

    // CREATE
    public function inserirFilme(Filme $filme) {
        $sql = "INSERT INTO Filme (titulo_filme, genero, duracao, diretor, class_indicativa, data_lancamento, cartaz, cartaz_tipo) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $filme->titulo, 
            $filme->genero, 
            $filme->duracao, 
            $filme->diretor, 
            $filme->classificacao,
            $filme->data_lancamento,
            $filme->cartaz,
            $filme->cartaz_tipo
        ]);
    }

    // READ
    public function listarFilmes() {
        $stmt = $this->db->query("SELECT * FROM Filme");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // UPDATE
    public function atualizar(Filme $f) {
        $sql = "UPDATE Filme SET titulo_filme = ?, genero = ?, duracao = ?, diretor = ?, class_indicativa = ?, data_lancamento = ?, cartaz = ?, cartaz_tipo = ? WHERE id_filme = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$f->titulo, $f->genero, $f->duracao, $f->diretor, $f->classificacao, $f->data_lancamento, $f->cartaz, $f->cartaz_tipo, $f->id]);
    }

    // DELETE
    public function deletar($id) {
        $sql = "DELETE FROM Filme WHERE id_filme = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
}