DROP DATABASE IF EXISTS sao_benedito;

CREATE DATABASE IF NOT EXISTS sao_benedito CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE sao_benedito;

CREATE TABLE IF NOT EXISTS usuarios(
	id_usuario BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    telefone VARCHAR(14) NOT NULL UNIQUE,
    endereco VARCHAR(255),
    tipo_usuario VARCHAR(255),
    -- log
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP,
    deletado_em DATETIME NULL
);

CREATE TABLE IF NOT EXISTS coordenadores(
	usuario_id BIGINT UNSIGNED NOT NULL,
    CONSTRAINT fk_usuarios_coordenadores
		FOREIGN KEY (usuario_id) REFERENCES usuarios (id_usuario)
);

CREATE TABLE IF NOT EXISTS catequizandos(
	usuario_id BIGINT UNSIGNED NOT NULL,
    data_nascimento DATE,
    escola VARCHAR(255),
    paroquia_origem VARCHAR(255),
    transferencia VARCHAR(255),
    CONSTRAINT fk_usuarios_catequizandos
		FOREIGN KEY (usuario_id) REFERENCES usuarios (id_usuario)
);

CREATE TABLE IF NOT EXISTS catequistas(
	usuario_id BIGINT UNSIGNED NOT NULL,
    CONSTRAINT fk_usuarios_catequistas
		FOREIGN KEY (usuario_id) REFERENCES usuarios (id_usuario)
);

CREATE TABLE IF NOT EXISTS reunioes(
	id_reuniao BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    tema VARCHAR(255) NOT NULL,
    descricao VARCHAR(255) NOT NULL,
    data_hora TIMESTAMP NOT NULL,
    local VARCHAR(255) NOT NULL,
    publico_alvo VARCHAR(255),
    organizador_id BIGINT UNSIGNED NOT NULL,
    -- log
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP,
    deletado_em DATETIME NULL,
    
    CONSTRAINT fk_usuarios_reunioes 
		FOREIGN KEY (organizador_id) REFERENCES usuarios (id_usuario)
);

CREATE TABLE IF NOT EXISTS etapas(
	id_etapa BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome_etapa VARCHAR(255) NOT NULL,
    descricao VARCHAR(255) NOT NULL,
    -- log
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP,
    deletado_em DATETIME NULL
);

CREATE TABLE IF NOT EXISTS turmas(
	id_turma BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nome_turma VARCHAR(100) NOT NULL,
    tipo_turma VARCHAR(10) NOT NULL,
    data_inicio DATE NOT NULL,
    data_termino DATE,
    etapa_id BIGINT UNSIGNED NOT NULL,
    -- log
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP,
    deletado_em DATETIME NULL,
    
    CONSTRAINT fk_etapas_turmas
		FOREIGN KEY (etapa_id) REFERENCES etapas (id_etapa)
);

CREATE TABLE IF NOT EXISTS avisos(
	id_aviso BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descricao VARCHAR(255) NOT NULL,
    data_publicacao DATE NOT NULL,
    turma_id BIGINT UNSIGNED NOT NULL,
    autor_id BIGINT UNSIGNED NOT NULL,
    -- log
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP,
    deletado_em DATETIME NULL,
    
    CONSTRAINT fk_turmas_avisos 
		FOREIGN KEY (turma_id) REFERENCES turmas (id_turma),
	CONSTRAINT fk_catequista_avisos
		FOREIGN KEY (autor_id) REFERENCES usuarios (id_usuario)
);

CREATE TABLE IF NOT EXISTS atividades(
	id_atividade BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descricao VARCHAR(255) NOT NULL,
    -- log
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP,
    deletado_em DATETIME NULL
);

CREATE TABLE IF NOT EXISTS respostas(
	id_resposta BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    catequizando_id BIGINT UNSIGNED NOT NULL,
    atividade_id BIGINT UNSIGNED NOT NULL,
    texto VARCHAR(255) NOT NULL,
    data_envio DATETIME NOT NULL,
    comentario_catequista VARCHAR(255),
    -- log
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP,
    deletado_em DATETIME NULL,
    
    CONSTRAINT fk_catequizandos_respostas
		FOREIGN KEY (catequizando_id) REFERENCES usuarios (id_usuario),
	CONSTRAINT fk_atividades_respostas
		FOREIGN KEY (atividade_id) REFERENCES atividades (id_atividade)
);

CREATE TABLE IF NOT EXISTS turmas_catequizandos(
	catequizando_id BIGINT UNSIGNED NOT NULL,
    turma_id BIGINT UNSIGNED NOT NULL,
    status VARCHAR(50) DEFAULT 'Cursando',
    CONSTRAINT fk_turmas_catequizandos_catequizandos
        FOREIGN KEY (catequizando_id) REFERENCES usuarios (id_usuario),
    CONSTRAINT fk_turmas_catequizandos_turmas
        FOREIGN KEY (turma_id) REFERENCES turmas (id_turma),
    PRIMARY KEY (catequizando_id, turma_id)
);

ALTER TABLE atividades
ADD COLUMN turma_id BIGINT UNSIGNED NOT NULL AFTER descricao,
ADD CONSTRAINT fk_turmas_atividades
    FOREIGN KEY (turma_id) REFERENCES turmas (id_turma);
    
ALTER TABLE atividades
ADD COLUMN data_entrega DATETIME NULL AFTER descricao,
ADD COLUMN tipo VARCHAR(50) DEFAULT 'reflexao' AFTER data_entrega;

ALTER TABLE turmas
ADD COLUMN codigo_turma VARCHAR(10) UNIQUE NULL AFTER etapa_id;

ALTER TABLE turmas
ADD COLUMN catequista_id BIGINT UNSIGNED NOT NULL AFTER etapa_id,
ADD CONSTRAINT fk_turmas_catequistas
    FOREIGN KEY (catequista_id) REFERENCES usuarios(id_usuario);