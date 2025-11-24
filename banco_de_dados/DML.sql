INSERT INTO usuarios (nome, email, senha, telefone, endereco, tipo_usuario)
VALUES
('Ana Oliveira', 'ana.oliveira@paroquia.com', '$2y$10$abcdef1234567890abcdef1234567890abcdef1234567890abcdef', '(14)99999-1111', 'Rua Santo Antônio, 10', 'catequista'),
('João Pereira', 'joao.pereira@paroquia.com', '$2y$10$abcdef1234567890abcdef1234567890abcdef1234567890abcdef', '(14)99999-2222', 'Rua São José, 120', 'catequista'),
('Carla Silva', 'carla.silva@paroquia.com', '$2y$10$abcdef1234567890abcdef1234567890abcdef1234567890abcdef', '(14)99999-3333', 'Av. Brasil, 540', 'catequista');

INSERT INTO catequistas (usuario_id)
VALUES 
(2),
(3),
(4);

INSERT INTO usuarios (nome, email, senha, telefone, endereco, tipo_usuario)
VALUES
('Lucas Martins', 'lucas.martins@paroquia.com', '$2y$10$xxx', '(14)97777-1111', 'Rua das Flores, 50', 'catequizando'),
('Paula Souza', 'paula.souza@paroquia.com', '$2y$10$xxx', '(14)97777-2222', 'Rua Azul, 22', 'catequizando'),
('Gabriel Costa', 'gabriel.costa@paroquia.com', '$2y$10$xxx', '(14)97777-3333', 'Rua Verde, 90', 'catequizando'),
('Julia Ramos', 'julia.ramos@paroquia.com', '$2y$10$xxx', '(14)97777-4444', 'Av. Jau, 210', 'catequizando');

INSERT INTO catequizandos (usuario_id, data_nascimento, escola, paroquia_origem, transferencia)
VALUES
(5, '2012-05-10', 'Escola São Paulo', 'Nossa Senhora Aparecida', NULL),
(6, '2011-09-28', 'Escola Padre Colli', 'São Benedito', NULL),
(7, '2013-01-15', 'Escola Frei Galvão', 'São Benedito', 'Transferido de paróquia X'),
(8, '2012-11-02', 'Escola Navarrete', 'Nossa Senhora do Patrocínio', NULL);

INSERT INTO turmas (nome_turma, tipo_turma, data_inicio, data_termino, etapa_id, codigo_turma, catequista_id)
VALUES
('Turma Alfa', 'Eucaristia', '2025-02-10', '2025-11-30', 1, 'ALFA25', 2),
('Turma Beta', 'Crisma', '2025-02-15', '2025-11-30', 3, 'BETA25', 3),
('Turma Jovem', 'Jovens', '2025-02-20', '2025-11-30', 5, 'JOVEM25', 4);