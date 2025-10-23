-- DROP DATABASE IF EXISTS sao_benedito;

CREATE DATABASE IF NOT EXISTS sao_benedito CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE sao_benedito;

-- SHOW TABLES;

CREATE TABLE IF NOT EXISTS coordenador(
	id_coordenador BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome varchar(255),
    email VARCHAR(255) UNIQUE, 
    senha VARCHAR(255),
    role ENUM('user', 'admin')
);

select * from coordenador;

/*
CREATE TABLE IF NOT EXISTS catequizandos(
	id_catequizando BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    etapa INT NOT NULL
);
*/