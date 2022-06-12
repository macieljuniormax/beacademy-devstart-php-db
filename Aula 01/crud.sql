USE db_escola;

-- Inserir um registro --
INSERT INTO
  tb_professor (nome, email, cpf)
VALUES
  (
    'Chiquinho das Tapiocas',
    'chiquim@email.com',
    '12345678999'
  );

-- Inserir vários registros --
INSERT INTO
  tb_professor (nome, email, cpf)
VALUES
  (
    'Zézim das Rapaduras',
    'zezim@email.com',
    '12345678914'
  ),
  (
    'Maria das Tapiocas',
    'maria@email.com',
    '12345678915'
  ),
  (
    'Luiza das Rapaduras',
    'luiza@email.com',
    '12345678916'
  );

-- Excluir 1 registro --
DELETE FROM
  tb_professor
where
  id = '8';

-- Excluir todos registros --
DELETE FROM
  tb_professor;

-- Editar dados de um registro --
UPDATE
  tb_professor
SET
  nome = 'Luiza da Caucaia'
WHERE
  cpf = '12345678916';

-- Editar dados de todos os registros --
UPDATE
  tb_professor
SET
  nome = 'Luiza da Caucaia';

-- Selecionar todos os dados --
SELECT
  *
FROM
  tb_professor;

-- Selecionar todos dados de um registro --
SELECT
  *
FROM
  tb_professor
WHERE
  id = '5';

-- Selecionar alguns dados de todos registros --
SELECT
  nome,
  cpf
FROM
  tb_professor;