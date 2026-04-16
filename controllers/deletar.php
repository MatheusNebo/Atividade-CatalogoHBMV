<?php
require_once __DIR__ . '/../app/FilmeRepository.php';
require_once __DIR__ . '/../app/SerieRepository.php';
require_once __DIR__ . '/../database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar tipo de requisição
    $tipo = isset($_POST['tipo']) ? trim($_POST['tipo']) : '';
    if (!in_array($tipo, ['filme', 'serie'])) {
        die("Tipo de requisição inválido");
    }

    // Validar ID
    if (empty($_POST['id']) || !is_numeric($_POST['id'])) {
        die("ID inválido!");
    }
    $id = intval($_POST['id']);

    try {
        if ($tipo === 'filme') {
            $repo = new FilmeRepository();
            $repo->deletar($id);
        } elseif ($tipo === 'serie') {
            $repo = new SerieRepository();
            $repo->deletar($id);
        }
        
        // Redireciona de volta para o catálogo após deletar
        header("Location: ../index.php?deletado=1");
        exit;

    } catch (Exception $e) {
        die("Erro ao deletar: " . htmlspecialchars($e->getMessage()));
    }
} else {
    die("Método de requisição inválido!");
}

