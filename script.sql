CREATE DATABASE db_proj3;
USE db_proj3;

CREATE TABLE ocorrencias (
    id INT PRIMARY KEY AUTO_INCREMENT,
    tipo VARCHAR(20),
    descricao LONGTEXT,
    horario DATETIME,
    coordenadaX INT,
    coordenadaY INT
);

CREATE TABLE anexos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    caminho VARCHAR(200),
    ocorrencia_id INT,
    FOREIGN KEY (ocorrencia_id) REFERENCES ocorrencia(id)
);
