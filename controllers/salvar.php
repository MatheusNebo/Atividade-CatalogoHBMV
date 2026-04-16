<?php
ini_set('upload_max_filesize', '500M');
ini_set('post_max_size', '500M');
ini_set('memory_limit', '500M');

require_once __DIR__ . '/../app/Filme.php';
require_once __DIR__ . '/../app/Serie.php';
require_once __DIR__ . '/../app/FilmeRepository.php';
require_once __DIR__ . '/../app/SerieRepository.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo = $_POST['tipo'];

    // Processar imagem se enviada
    $cartaz = null;
    $cartaz_tipo = null;
    if (isset($_FILES['cartaz']) && $_FILES['cartaz']['error'] === UPLOAD_ERR_OK) {
        $cartaz = file_get_contents($_FILES['cartaz']['tmp_name']);
        $cartaz_tipo = $_FILES['cartaz']['type'];
    }

    try {
        if ($tipo === 'filme') {
            // 1. Instancia o objeto Filme com os dados do POST
            $filme = new Filme(
                null, 
                $_POST['titulo'], 
                $_POST['genero'], 
                $_POST['diretor'], 
                $_POST['classificacao'],
                $_POST['duracao'],
                $_POST['data_lancamento'],
                $cartaz,
                $cartaz_tipo
            );

            // 2. Usa o Repositório para salvar
            $repo = new FilmeRepository();
            $repo->inserirFilme($filme);

        } elseif ($tipo === 'serie') {
            // 1. Instancia o objeto Serie
            $serie = new Serie(
                null, 
                $_POST['titulo'], 
                $_POST['genero'], 
                $_POST['diretor'], 
                $_POST['classificacao'],
                $_POST['temporadas'],
                $_POST['episodios'],
                $_POST['data_lancamento'],
                $cartaz,
                $cartaz_tipo
            );

            // 2. Usa o Repositório para salvar
            $repo = new SerieRepository();
            $repo->inserirSerie($serie);
        }

        // Redireciona de volta para o catálogo após salvar
        header("Location: ../index.php?sucesso=1");
        exit;

    } catch (Exception $e) {
        die("Erro ao salvar: " . $e->getMessage());
    }
}