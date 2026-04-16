<?php
require_once __DIR__ . '/app/SerieRepository.php';
require_once __DIR__ . '/database.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Gerar token CSRF
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrf_token = $_SESSION['csrf_token'];

// Validar ID da série
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID de série inválido!");
}

$id_serie = intval($_GET['id']);

// Buscar dados da série
$repo = new SerieRepository();
$series = $repo->listarSeries();
$serie = null;

foreach ($series as $s) {
    if ($s['id_serie'] == $id_serie) {
        $serie = $s;
        break;
    }
}

if (!$serie) {
    die("Série não encontrada!");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Editar Série</title>
</head>
<body>
    <header>
        <div class="ld_esq"><h1>HBMV</h1></div>
        <div class="ld_dir"><img src="" alt="icon_login"></div>
    </header>

    <main>
        <h1>Editar Série</h1>
        <form action="controllers/atualizar.php" method="POST" class="container_form" enctype="multipart/form-data">

            <input type="hidden" name="tipo" value="serie">
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">
            <input type="hidden" name="id_serie" value="<?php echo htmlspecialchars($serie['id_serie']); ?>">
            
            <input type="text" name="titulo" placeholder="Título da Série" value="<?php echo htmlspecialchars($serie['titulo_serie']); ?>" required maxlength="255"><br>
            
            <input type="text" name="genero" placeholder="Gênero" value="<?php echo htmlspecialchars($serie['genero']); ?>" maxlength="100"><br>
                        
            <input type="text" name="diretor" placeholder="Diretor" value="<?php echo htmlspecialchars($serie['diretor']); ?>" maxlength="255"><br>
            
            <input type="text" name="classificacao" placeholder="Classificação (ex: 14+)" value="<?php echo htmlspecialchars($serie['class_indicativa']); ?>" maxlength="20"><br>
            
            <input type="number" name="temporadas" placeholder="Número de Temporadas" value="<?php echo htmlspecialchars($serie['temporadas']); ?>" min="1" max="999"><br>
            
            <input type="number" name="episodios" placeholder="Número de Episódios" value="<?php echo htmlspecialchars($serie['episodios']); ?>" min="1" max="9999"><br>
            
            <input type="number" name="data_lancamento" placeholder="Data de Lançamento" value="<?php echo htmlspecialchars($serie['data_lancamento']); ?>" min="1800" max="2100"><br>
            
            <label>Imagem atual (Cartaz)</label>
            <?php if ($serie['cartaz']): ?>
                <div style="margin: 10px 0;">
                    <img src="data:<?php echo htmlspecialchars($serie['cartaz_tipo']); ?>;base64,<?php echo base64_encode($serie['cartaz']); ?>" alt="Cartaz" style="max-width: 150px; border-radius: 8px;">
                </div>
            <?php endif; ?>
            
            <input type="file" name="cartaz" accept="image/*"><br>
            <small style="color: #ccc;">Deixe em branco para manter a imagem atual</small><br>
            
            <button type="submit">Atualizar Série</button>

        </form>
        <a href="index.php" class="btn_voltar">Voltar ao Catálogo</a>
    </main>

</body>
</html>
