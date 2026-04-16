<?php
// 1. Importa os repositórios
require_once __DIR__ . '/app/FilmeRepository.php';
require_once __DIR__ . '/app/SerieRepository.php';

// 2. Instancia e busca os dados
$filmeRepo = new FilmeRepository();
$listaFilmes = $filmeRepo->listarFilmes();

$serieRepo = new SerieRepository();
$listaSeries = $serieRepo->listarSeries();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>HBMV - Catálogo</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <header>
        <div class="ld_esq"><h1>HBMV</h1></div>
        <div class="ld_dir"><img src="" alt="icon_login"></div>
    </header>

    <main>
        <h1>Filmes</h1>
        <div class="container_filme">
            
            <?php foreach ($listaFilmes as $filme): ?>
                <div class="card_filme">

                    <?php if ($filme['cartaz']): ?>
                        <img src="data:<?= $filme['cartaz_tipo'] ?>;base64,<?= base64_encode($filme['cartaz']) ?>" alt="Cartaz do filme" class="cartaz">
                    <?php endif; ?>
                    <h2><?= htmlspecialchars($filme['titulo_filme']) ?></h2>
                    <p><?= htmlspecialchars($filme['genero']) ?></p>
                    <p><?= $filme['duracao'] ?> min</p>
                    <p><?= htmlspecialchars($filme['diretor']) ?></p>
                    <p><?= htmlspecialchars($filme['class_indicativa']) ?></p>
                    <p><?= htmlspecialchars($filme['data_lancamento']) ?></p>

                    <div class="card_actions">
                        <a href="editar_filme.php?id=<?= htmlspecialchars($filme['id_filme']) ?>" class="btn_editar">Editar</a>
                        <form method="POST" action="controllers/deletar.php" style="display: inline;" onsubmit="return confirm('Tem certeza que deseja deletar este filme?');">
                            <input type="hidden" name="tipo" value="filme">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($filme['id_filme']) ?>">
                            <button type="submit" class="btn_deletar">Deletar</button>
                        </form>
                    </div>

                </div>
            <?php endforeach; ?>

        </div>

        <h1 class="titulo2">Séries</h1>
        <div class="container_serie">
            
            <?php foreach ($listaSeries as $serie): ?>
                <div class="card_serie">

                    <?php if ($serie['cartaz']): ?>
                        <img src="data:<?= $serie['cartaz_tipo'] ?>;base64,<?= base64_encode($serie['cartaz']) ?>" alt="Cartaz da série" class="cartaz">
                    <?php endif; ?>
                    <h2><?= htmlspecialchars($serie['titulo_serie']) ?></h2>
                    <p><?= htmlspecialchars($serie['genero']) ?></p>
                    <p><?= $serie['temporadas'] ?> Temps</p>
                    <p><?= $serie['episodios'] ?> Ep</p>
                    <p><?= htmlspecialchars($serie['diretor']) ?></p>
                    <p><?= htmlspecialchars($serie['class_indicativa']) ?></p>
                    <p><?= htmlspecialchars($serie['data_lancamento']) ?></p>

                    <div class="card_actions">
                        <a href="editar_serie.php?id=<?= htmlspecialchars($serie['id_serie']) ?>" class="btn_editar">Editar</a>
                        <form method="POST" action="controllers/deletar.php" style="display: inline;" onsubmit="return confirm('Tem certeza que deseja deletar esta série?');">
                            <input type="hidden" name="tipo" value="serie">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($serie['id_serie']) ?>">
                            <button type="submit" class="btn_deletar">Deletar</button>
                        </form>

                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </main>
    <a href="form_filme.php" class="btn_cadastrar">Cadastrar Filme</a><br>
    <a href="form_serie.php" class="btn_cadastrar">Cadastrar Série</a>
</body>
</html>