<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Cadastro de Série</title>
</head>
<body>
    <header>
        <div class="ld_esq"><h1>HBMV</h1></div>
        <div class="ld_dir"><img src="" alt="icon_login"></div>
    </header>

    <main>
        <h1>Cadastrar Série</h1>
            <form action="controllers/salvar.php" method="POST" class="container_form" enctype="multipart/form-data">

            <input type="hidden" name="tipo" value="serie"><br>
            <input type="text" name="titulo" placeholder="Título da Série" required><br>
            <input type="text" name="genero" placeholder="Gênero"><br>
            <input type="text" name="diretor" placeholder="Diretor"><br>
            <input type="text" name="classificacao" placeholder="Classificação (ex: 14+)"><br>
            <input type="number" name="temporadas" placeholder="Número de Temporadas"><br>
            <input type="number" name="episodios" placeholder="Número de Episódios"><br>
            <input type="number" name="data_lancamento" placeholder="Data de Lançamento"><br>
            <input type="file" name="cartaz" accept="image/*"><br>
            <button type="submit">Cadastrar Série</button>
    
            </form>
        <a href="index.php" class="btn_voltar">Voltar ao Catálogo</a>
    </main>
</body>
</html>