<?php
require_once dirname(__DIR__) . '/database.php';
require_once __DIR__ . '/Serie.php';

class SerieRepository {
    private $db;

    public function __construct() {
        $this->db = Database::conectar();
    }

    public function inserirSerie(Serie $serie) {
        $sql = "INSERT INTO Serie (titulo_serie, genero, temporadas, episodios, diretor, class_indicativa, data_lancamento, cartaz, cartaz_tipo) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            $serie->titulo,
            $serie->genero,
            $serie->temporadas, // Atributo exclusivo de Serie
            $serie->episodios,  // Atributo exclusivo de Serie
            $serie->diretor,
            $serie->classificacao,
            $serie->data_lancamento,
            $serie->cartaz,
            $serie->cartaz_tipo
        ]);
    }

    public function listarSeries() {
        $stmt = $this->db->query("SELECT * FROM Serie");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

     // UPDATE
    public function atualizar(Serie $s) {
        $sql = "UPDATE Serie SET titulo_serie = ?, genero = ?, temporadas = ?, episodios = ?, diretor = ?, class_indicativa = ?, data_lancamento = ?, cartaz = ?, cartaz_tipo = ? WHERE id_serie = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$s->titulo, $s->genero, $s->temporadas, $s->episodios, $s->diretor, $s->classificacao, $s->data_lancamento, $s->cartaz, $s->cartaz_tipo, $s->id]);
    }

    // DELETE
    public function deletar($id) {
        $sql = "DELETE FROM Serie WHERE id_serie = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
}
