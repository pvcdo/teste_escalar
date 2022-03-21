CREATE TABLE `tvs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `valor` float(10,2) NOT NULL,
  `imagem` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci

CREATE TABLE `players` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `valor` float(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci

CREATE TABLE `planos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `valorMensal` float(10,2) DEFAULT NULL,
  `valorAnual` float(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci

INSERT INTO tvs(
  nome,valor
)values
  ("TV 32 polegadas",500),
  ("TV 40 polegadas",1000),

NSERT INTO players(
  nome,valor
)values
  ("Alphasignage",292),
  ("Alphasignage Secundário",249);

INSERT INTO planos(
  nome,valorMensal, valorAnual
)values
  ("Bronze",39, 15.9),
  ("Prata",49, 19.6),
  ("Ouro",59, 23.01),
  ("Diamante",69, 26.67);