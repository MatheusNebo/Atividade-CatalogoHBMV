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

--INSERTS PARA TESTE
INSERT INTO Filme (titulo_filme, genero, duracao, diretor, class_indicativa, data_lancamento, cartaz, cartaz_tipo) VALUES
('Interestelar', 'Ficção Científica', 169, 'Christopher Nolan', '12+', 2014, NULL, NULL),
('O Poderoso Chefão', 'Crime', 175, 'Francis Ford Coppola', '14+', 1972, NULL, NULL),
('Matrix', 'Ação', 136, 'Lilly e Lana Wachowski', '12+', 1999, NULL, NULL),
('Cidade de Deus', 'Drama', 130, 'Fernando Meirelles', '18+', 2002, NULL, NULL),
('Parasita', 'Suspense', 132, 'Bong Joon-ho', '16+', 2019, NULL, NULL),
('O Rei Leão', 'Animação', 88, 'Roger Allers', 'Livre', 1994, NULL, NULL),
('Batman: O Cavaleiro das Trevas', 'Ação', 152, 'Christopher Nolan', '12+', 2008, NULL, NULL),
('Pulp Fiction', 'Crime', 154, 'Quentin Tarantino', '18+', 1994, NULL, NULL),
('A Origem', 'Ficção Científica', 148, 'Christopher Nolan', '14+', 2010, NULL, NULL),
('Gladiador', 'Ação/Drama', 155, 'Ridley Scott', '14+', 2000, NULL, NULL);

INSERT INTO Serie (titulo_serie, genero, temporadas, episodios, diretor, class_indicativa, data_lancamento, cartaz, cartaz_tipo) VALUES
('Breaking Bad', 'Drama', 5, 62, 'Vince Gilligan', '18+', 2008, NULL, NULL),
('Stranger Things', 'Ficção Científica', 4, 34, 'The Duffer Brothers', '14+', 2016, NULL, NULL),
('The Office', 'Comédia', 9, 201, 'Greg Daniels', '12+', 2005, NULL, NULL),
('Game of Thrones', 'Fantasia', 8, 73, 'David Benioff', '18+', 2011, NULL, NULL),
('Succession', 'Drama', 4, 39, 'Jesse Armstrong', '16+', 2018, NULL, NULL),
('The Bear', 'Drama', 3, 28, 'Christopher Storer', '16+', 2022, NULL, NULL),
('The Last of Us', 'Ação/Aventura', 1, 9, 'Craig Mazin', '16+', 2023, NULL, NULL),
('Better Call Saul', 'Drama', 6, 63, 'Vince Gilligan', '16+', 2015, NULL, NULL),
('Dark', 'Suspense/Ficção', 3, 26, 'Baran bo Odar', '16+', 2017, NULL, NULL),
('Friends', 'Comédia', 10, 236, 'David Crane', '12+', 1994, NULL, NULL);