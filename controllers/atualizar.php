<?php
require_once __DIR__ . '/../app/FilmeRepository.php';
require_once __DIR__ . '/../app/SerieRepository.php';
require_once __DIR__ . '/../database.php';

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
            $id = intval($_POST['id_filme']);

            // 1. Instancia o objeto Filme com os dados do POST
            $filme = new Filme(
                $id,
                $_POST['titulo'],
                $_POST['genero'],
                $_POST['diretor'],
                $_POST['classificacao'],
                $_POST['duracao'],
                $_POST['data_lancamento'],
                $cartaz,
                $cartaz_tipo
            );

            // 2. Usa o Repositório para atualizar
            $repo = new FilmeRepository();
            $repo->atualizar($filme);

        } elseif ($tipo === 'serie') {
            $id = intval($_POST['id_serie']);

            // 1. Instancia o objeto Serie
            $serie = new Serie(
                $id,
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

            // 2. Usa o Repositório para atualizar
            $repo = new SerieRepository();
            $repo->atualizar($serie);
        }

        // Redireciona de volta para o catálogo após atualizar
        header("Location: ../index.php?atualizado=1");
        exit;

    } catch (Exception $e) {
        die("Erro ao atualizar: " . htmlspecialchars($e->getMessage()));
    }
} else {
    die("Método de requisição inválido!");
}