-- Para criar um banco de dados --
CREATE DATABASE db_escola;

-- Selecionar banco de dados --
USE db_escola;

-- Criar uma tabela --
CREATE TABLE tb_professor(
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(128) NOT NULL,
  cpf CHAR(11) UNIQUE NOT NULL,
  email VARCHAR(128) UNIQUE NOT NULL
);

CREATE TABLE tb_aluno(
  nome VARCHAR(128) NOT NULL,
  cpf CHAR(11) NOT NULL,
  email VARCHAR(128) NOT NULL,
  matricula VARCHAR(10) NOT NULL
);

-- Inserir Dados --
INSERT INTO
  tb_professor(nome, email, cpf)
VALUES
  ('Maciel', 'maciel@email.com', '12345678912');

INSERT INTO
  tb_professor(nome, email, cpf)
VALUES
  ('Bruno', 'bruno@email.com', '12345678913');

INSERT INTO
  tb_aluno(nome, email, cpf, matricula)
VALUES
  (
    'Rodrigo',
    'rodrigo@email.com',
    '12345678913',
    '1234567891'
  );

INSERT INTO
  tb_aluno(nome, email, cpf, matricula)
VALUES
  (
    'Alessandro',
    'alessandro@email.com',
    '12345678913',
    '1234567891'
  );

-- Excluir Tabela --
DROP TABLE IF EXISTS `tb_professor`;

-- Excluir Tabela --
DELETE FROM
  tb_professor
WHERE
  id = '3';

-- Buscar Dados --
SELECT
  *
FROM
  tb_professor;