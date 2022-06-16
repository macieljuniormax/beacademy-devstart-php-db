CREATE DATABASE db_store;

-- Selecionar Banco --
USE db_store;

CREATE TABLE tb_category(
  id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(32) NOT NULL,
  description VARCHAR(128) NOT NULL
);

INSERT INTO
  tb_category (name, description)
VALUES
  ('Livros', 'Livros em Geral');

INSERT INTO
  tb_category (name, description)
VALUES
  (
    'Informática',
    'Produtos de Informática e peças para computador'
  ),
  (
    'Escritório',
    'Canetas, cadernos, folhas, etc'
  ),
  (
    'Eletrônicos',
    'TVs, som portátil, caixas de som, etc'
  );

CREATE TABLE tb_product(
  id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(32) NOT NULL,
  description VARCHAR(128) NOT NULL,
  photo VARCHAR(255) NOT NULL,
  valor FLOAT(5, 2) NOT NULL,
  categoria_id INT(11) NOT NULL,
  quantity INT(5) NOT NULL,
  created_at DATETIME NOT NULL
);

DESC tb_product;