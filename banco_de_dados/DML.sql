USE sao_benedito;

-- ==============================
-- USUÁRIOS
-- ==============================
INSERT INTO usuarios (nome, email, senha, telefone, endereco, tipo_usuario)
VALUES
('Maria dos Santos', 'maria.santos@paroquia.com', '123456', '(14)98888-1111', 'Rua das Rosas, 45', 'coordenador'),
('João Pereira', 'joao.pereira@paroquia.com', '123456', '(14)98888-2222', 'Av. Principal, 210', 'catequista'),
('Ana Lima', 'ana.lima@paroquia.com', '123456', '(14)98888-3333', 'Rua São João, 101', 'catequista'),
('Lucas Fernandes', 'lucas.fernandes@paroquia.com', '123456', '(14)98888-4444', 'Rua Santa Luzia, 99', 'catequizando'),
('Carla Souza', 'carla.souza@paroquia.com', '123456', '(14)98888-5555', 'Rua Santo Antônio, 80', 'catequizando');

-- ==============================
-- COORDENADORES
-- ==============================
INSERT INTO coordenadores (usuario_id)
VALUES
(1); -- Maria dos Santos

-- ==============================
-- CATEQUISTAS
-- ==============================
INSERT INTO catequistas (usuario_id)
VALUES
(2), -- João Pereira
(3); -- Ana Lima

-- ==============================
-- CATEQUIZANDOS
-- ==============================
INSERT INTO catequizandos (usuario_id, data_nascimento, escola, paroquia_origem, transferencia)
VALUES
(4, '2010-05-20', 'Escola São Lucas', 'Paróquia São Benedito', 'Não'),
(5, '2011-09-10', 'Escola Santo André', 'Paróquia São Benedito', 'Sim');

-- ==============================
-- ETAPAS
-- ==============================
INSERT INTO etapas (nome_etapa, descricao)
VALUES ('Eucaristia', 'Preparação para a Primeira Eucaristia');

-- ==============================
-- TURMAS
-- ==============================
INSERT INTO turmas (nome_turma, tipo_turma, data_inicio, data_termino, etapa_id)
VALUES
('1ª Etapa - Eucaristia', 'Infantil', '2025-02-01', '2025-12-15', 1),
('2ª Etapa - Perseverança', 'Infantil', '2025-02-01', '2025-12-15', 1);

