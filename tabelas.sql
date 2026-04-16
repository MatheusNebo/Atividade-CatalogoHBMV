CREATE TABLE Filme(
    id_filme INT AUTO_INCREMENT PRIMARY KEY,
    titulo_filme VARCHAR(120) NOT NULL,
    genero VARCHAR(120) NOT NULL,
    duracao INT(3) NOT NULL,
    diretor VARCHAR(120) NULL,
    class_indicativa VARCHAR(6) NOT NULL,
    data_lancamento INT(4) NOT NULL,
    cartaz LONGBLOB NULL,
    cartaz_tipo VARCHAR(50) NULL -- formato da imagem (png, jpg, etc.)
);
 
CREATE TABLE Serie(
    id_serie INT AUTO_INCREMENT PRIMARY KEY,
    titulo_serie VARCHAR(120) NOT NULL,
    genero VARCHAR(120) NOT NULL,
    temporadas INT(3) NOT NULL,
    episodios INT(6) NOT NULL,
    diretor VARCHAR(120) NULL,
    class_indicativa VARCHAR(6) NOT NULL,
    data_lancamento INT(4) NOT NULL,
    cartaz LONGBLOB NULL,
    cartaz_tipo VARCHAR(50) NULL -- formato da imagem (png, jpg, etc.)
);