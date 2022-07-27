CREATE TABLE empregados (
  empregado_id int NOT NULL PRIMARY KEY,
  data_nascimento date NOT NULL,
  nome varchar(14) NOT NULL,
  sobrenome varchar(16) NOT NULL,
  genero enum('M','F') NOT NULL,
  data_admissao date NOT NULL
)