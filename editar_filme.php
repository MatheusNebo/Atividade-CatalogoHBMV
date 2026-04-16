<?php
require_once __DIR__ . '/app/FilmeRepository.php';
require_once __DIR__ . '/database.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Gerar token CSRF
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrf_token = $_SESSION['csrf_token'];

// Validar ID do filme
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID de filme inválido!");
}

$id_filme = intval($_GET['id']);

// Buscar dados do filme
$repo = new FilmeRepository();
$filmes = $repo->listarFilmes();
$filme = null;

foreach ($filmes as $f) {
    if ($f['id_filme'] == $id_filme) {
        $filme = $f;
        break;
    }
}

if (!$filme) {
    die("Filme não encontrado!");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Editar Filme</title>
</head>
<body>
    <header>
        <div class="ld_esq"><h1>HBMV</h1></div>
        <div class="ld_dir"><img src="" alt="icon_login"></div>
    </header>

    <main>
        <h1>Editar Filme</h1>
        <form action="controllers/atualizar.php" method="POST" class="container_form" enctype="multipart/form-data">

            <input type="hidden" name="tipo" value="filme">
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">
            <input type="hidden" name="id_filme" value="<?php echo htmlspecialchars($filme['id_filme']); ?>">
            
            <input type="text" name="titulo" placeholder="Título do Filme" value="<?php echo htmlspecialchars($filme['titulo_filme']); ?>" required maxlength="255"><br>
            
            <input type="text" name="genero" placeholder="Gênero" value="<?php echo htmlspecialchars($filme['genero']); ?>" maxlength="100"><br>
            
            <input type="number" name="duracao" placeholder="Duração (min)" value="<?php echo htmlspecialchars($filme['duracao']); ?>" min="1" max="999"><br>
            
            <input type="text" name="diretor" placeholder="Diretor" value="<?php echo htmlspecialchars($filme['diretor']); ?>" maxlength="255"><br>
            
            <input type="text" name="classificacao" placeholder="Classificação (ex: 14+)" value="<?php echo htmlspecialchars($filme['class_indicativa']); ?>" maxlength="20"><br>
            
            <input type="number" name="data_lancamento" placeholder="Data de Lançamento" value="<?php echo htmlspecialchars($filme['data_lancamento']); ?>" min="1800" max="2100"><br>
            
            <label>Imagem atual (Cartaz)</label>
            <?php if ($filme['cartaz']): ?>
                <div style="margin: 10px 0;">
                    <img src="data:<?php echo htmlspecialchars($filme['cartaz_tipo']); ?>;base64,<?php echo base64_encode($filme['cartaz']); ?>" alt="Cartaz" style="max-width: 150px; border-radius: 8px;">
                </div>
            <?php endif; ?>
            
            <input type="file" name="cartaz" accept="image/*"><br>
            <small style="color: #ccc;">Deixe em branco para manter a imagem atual</small><br>
            
            <button type="submit">Atualizar Filme</button>

        </form>
        <a href="index.php" class="btn_voltar">Voltar ao Catálogo</a>
    </main>

</body>
</html>
