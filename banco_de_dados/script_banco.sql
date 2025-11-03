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