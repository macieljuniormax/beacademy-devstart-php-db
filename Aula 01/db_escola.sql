-- Para criar um banco de dados --
CREATE DATABASE db_escola;

-- Selecionar banco de dados --
USE db_escola;

-- Criar uma tabela --
CREATE TABLE tb_professor(
  nome VARCHAR(128) NOT NULL,
  cpf CHAR(11) NOT NULL,
  email VARCHAR(128) NOT NULL
);